<?php

namespace App\Http\Controllers\admin;

use App\Models\Course;
use App\Models\Mentor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

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

            $course = Course::create($validatedData);
            return redirect()->route('admin.kursus.add')->with('success', 'Kursus berhasil ditambahkan');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('admin.kursus.add')->with('error', 'Kursus gagal ditambahkan')->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        return view('admin.kursus.show', ['kursus' => $course]);
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
            $course->update($request->all());
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
