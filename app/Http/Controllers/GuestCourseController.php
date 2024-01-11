<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Guest;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseCategories;

class GuestCourseController extends Controller
{
    public function index()
    {
        $dataKursus = CourseCategories::whereHas('courses', function($query){
            $query->withCount('enrollments')
            ->where('status', 'published')
            ->where('start_at', '>=', Carbon::now())
            ->latest()
            ->take(8)->get();
        })->get();
        dd($dataKursus);
        // return view('kursus.index', ['kursus' => $dataKursus]);
    }
    public function show(string $slug)
    {
        $course = Course::with('guestcourses')->where('slug', $slug)->first();
    }

    public function store(Request $request, string $slug, $id)
    {
        $course = Course::with('guestcourses')->where('id', $id)->first();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|max:16',
            'email' => 'required|email',
            'province_id' => 'required',
            'city_id' => 'required',
            'company_name' => 'nullable|string',
            'job_title' => 'nullable|string',
            'knows_from' => 'required|string',
        ]);
        $guest = Guest::create($data);
        $createGuestCourse = $course->guestcourses()->create([
                                                'guest_id' => $guest->id,
                                            ]);
        if($createGuestCourse){
            return redirect()->route('kursus.show', $id)->with('success', 'Berhasil Daftarkan diri ke Kursus  ini');
        }else{
            return redirect()->route('kursus.show', $id)->with('error', 'Gagal Mendaftar, silahkan ulangi lagi')->withInput();
        }
    }
}
