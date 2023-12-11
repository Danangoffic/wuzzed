<?php

namespace App\Http\Controllers\admin;

use App\Models\Guest;
use App\Models\Course;
use App\Models\GuestCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TamuKursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $course = Course::with('guestcourses.guest')->findOrFail($id);
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
            return redirect()->route('admin.kursus.show', $id)->with('success', 'Berhasil tambahkan tamu');
        }else{
            return redirect()->route('admin.kursus.show', $id)->with('error', 'Gagal tambahkan tamu');
        }
        // $guest = Guest::create($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail = GuestCourse::with(['course','guest'])->findOrFail($id);
        return view('admin.kursus.guest.show', ['detail' => $detail]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = GuestCourse::findOrFail($id);
            $request->validate([
                'status_payment' => 'required|string|in:pending,paid',
                'course_id' => 'required',
                'guest_id' => 'required'
            ]);
            $data->status_payment = $request->status_payment;
            $data->update();
            return redirect()->route('admin.tamu.show', $id)->with('success', 'Berhasil update status pembayaran!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal update status pembayaran dengan ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
