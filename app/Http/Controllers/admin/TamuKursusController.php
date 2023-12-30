<?php

namespace App\Http\Controllers\admin;

use App\Models\Guest;
use App\Models\Course;
use App\Models\GuestCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TamuKursusController extends Controller
{
    public function index()
    {
        if($request->user()->role == 'admin') {
            $data = GuestCourse::with(['course','guest'])->latest()->get();
            $view = (string) view('admin.kursus.list-tamu-kursus', ['guest' => $data]);
            return response($view);
        } else {
            return redirect()->route('/login');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function list_tamu_kursus_api(Request $request, $id)
    {
        if($request->user()->role == 'mentor') {
            $data = GuestCourse::with(['course','guest'])->where('mentor_id', $request->user()->mentor->id)->findOrFail($id);
            $view = (string) view('admin.kursus.list-tamu-kursus', ['guest' => $data]);
            return response($view);
        } else {
            $data = GuestCourse::with(['course','guest'])->where('course_id', $id)->get();
            $view = (string) view('admin.kursus.list-tamu-kursus', ['guest' => $data]);
            return response($view);
        }
        return response('not found', 404);
    }

    public function count_tamu_status_payment(Request $request, $id)
    {
        if(!$request->has('type')){
            return abort(404, 'type must be provided');
        }
        $type = $request->post('type');
        $status = 'pending';
        if($type == 1){
            $status = 'paid';
        }
        if($request->user()->role == 'mentor') {
            $data = GuestCourse::where('mentor_id', $request->user()->mentor->id)
                                ->where([
                                    'course_id' => $id,
                                    'status_payment'=> $status
                                ])
                                ->count();
            return response($data);
        } else {
            $data = GuestCourse::where([
                                    'course_id' => $id,
                                    'status_payment'=> $status
                                ])->count();
            return response($data);
        }
        return abort(403, 'Forbidden');
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
    public function show(Course $course, string $id)
    {
        $detail = GuestCourse::with(['course','guest'])->where(['course_id' => $course->id, 'guest_id' => $id])->first();
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
