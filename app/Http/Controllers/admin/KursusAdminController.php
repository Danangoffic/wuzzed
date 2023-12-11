<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\GuestCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class KursusAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKursus = Course::latest()->paginate(15);
        return view('admin.kursus.index', ['kursus' => $dataKursus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mentors = Mentor::all();
        return view('admin.kursus.add', ['mentors' => $mentors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'certificate' => 'required',
                'thumbnail' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
                'type' => 'required|in:free,premium',
                'description' => 'required|string',
                'price' => 'required|integer',
                'level' => 'nullable|string',
                'duration' => 'nullable|integer',
                'status' => 'string|in:draft,published',
                'mentor_name' => 'string|required|max:255',
                'start_course' => 'required|date',
            ]);

            $validatedData['slug'] = str()->slug($validatedData['name']);

            $course = Course::create($validatedData);
            return redirect()->route('admin.kursus.add')->with('success', 'Kursus berhasil ditambahkan');
        } catch (\Throwable $th) {
            //throw $th;
            Log::debug("failed to create course: " . $th->getMessage());
            return redirect()->route('admin.kursus.add')->with('error', 'Kursus gagal ditambahkan')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        $guest = GuestCourse::with('guest')->where(['course_id' => $id])->paginate(20);
        $guestPaid = GuestCourse::where(['course_id' => $id, 'status_payment' => 'paid'])->count();
        $guestPending = GuestCourse::where(['course_id' => $id, 'status_payment' => 'pending'])->count();
        return view('admin.kursus.show', ['kursus' => $course, 'guest' => $guest, 'paid' => $guestPaid, 'pending' => $guestPending]);
    }

    public function show_guests($id)
    {
        $guestCourse = Course::with('guestcourses.guest')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin.kursus.edit', ['kursus' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);
        if($course){
            // Validasi data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'certificate' => 'required',
                'thumbnail' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
                'type' => 'required|in:free,premium',
                'description' => 'required|string',
                'price' => 'required|integer',
                'level' => 'nullable|string',
                'duration' => 'nullable|integer',
                'status' => 'string|in:draft,published',
                'mentor_name' => 'string|required|max:255',
                'start_course' => 'required|date',
            ]);
            $validatedData['slug'] = str($validatedData['name'])->slug()->value();
            $course->update($validatedData);
            return redirect()->route('admin.kursus')->with('success', 'Kursus berhasil Diupdate');
        }else{
            return redirect()->route('admin.kursus')->with('error', 'Kursus Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        if($course){
            $course->delete();
            return redirect()->route('admin.kursus')->with('success', 'Kursus berhasil Dihapus');
        }else{
            return redirect()->route('admin.kursus')->with('error', 'Kursus Gagal Dihapus');
        }
    }
}
