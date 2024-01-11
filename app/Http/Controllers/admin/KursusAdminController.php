<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\GuestCourse;
use Illuminate\Http\Request;
use App\Models\MentorsCourse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class KursusAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $initData = Course::with(['category']);
        if(auth()->user()->role == 'mentor') {
            $dataKursus = $initData->where('mentor_id', auth()->user()->id)->latest()->paginate(15);
        } else {
            $dataKursus = $initData->latest()->paginate(15);
        }
        return view('admin.kursus.index', ['kursus' => $dataKursus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mentors = Mentor::all();
        $categories = \App\Models\CourseCategories::all();
        return view('admin.kursus.add', ['mentors' => $mentors, 'categories' => $categories]);
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
                'thumbnail' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5120',
                'poster' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5120',
                'type' => 'required|in:free,premium',
                'jenis' => 'required|in:live,online,bootcamp,e-book',
                'description' => 'required|string',
                'price' => 'required|integer',
                'level' => 'nullable|string',
                'duration' => 'nullable|integer',
                'status' => 'string|in:draft,published',
                'mentor_id' => 'required',
                'start_course' => 'nullable|date',
                'url_kursus' => 'nullable|string',
                'category_id' => 'required'
            ]);

            $validatedData['slug'] = str()->slug($validatedData['name']);
            $mentor = Mentor::findOrFail($request->post('mentor_id'));

            // upload thumbnail and poster
            try {
                if ($request->hasFile('thumbnail')) {
                    Log::debug("upload thumbnail", ['thumbnail' => $request->file('thumbnail')]);
                    $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnail', ['disk' => 'public']);
                    Log::debug('thumbnail uploaded to ' . $validatedData['thumbnail']);
                }
            } catch (\Throwable $th) {
                //throw $th;
                Log::debug("failed to upload thumbnail: " . $th->getMessage());
                return redirect()->route('admin.kursus.add')->with('error',  'Thumbnail gagal diupload karena ' . $th->getMessage() . ' at line ' . $th->getLine() . ' at code ' . $th->getCode())->withInput();
            }
            try {
                if ($request->hasFile('poster')) {
                    $validatedData['poster'] = $request->file('poster')->store('poster', ['disk' => 'public']);
                    Log::debug('poster uploaded to ' . $validatedData['poster']);
                }
            } catch (\Throwable $th) {
                //throw $th;
                Log::debug("failed to upload poster: " . $th->getMessage());
                return redirect()->route('admin.kursus.add')->with('error',  'Poster gagal diupload karena ' . $th->getMessage() . ' at line ' . $th->getLine() . ' at code ' . $th->getCode())->withInput();
            }

            // $validatedData['mentor_name'] = $mentor->name;

            $course = Course::create($validatedData);
            $mentorCourse = MentorsCourse::create([
                'course_id' => $course->id,
                'mentor_id' => $mentor->id
            ]);
            return redirect()->route('admin.kursus.add')->with('success', 'Kursus berhasil ditambahkan');
        } catch (\Throwable $th) {
            //throw $th;
            Log::debug("failed to create course: " . $th->getMessage());
            return redirect()->route('admin.kursus.add')->with('error', 'Kursus gagal ditambahkan karena ' . $th->getMessage() . ' at line ' . $th->getLine() . ' at code ' . $th->getCode())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(auth()->user()->role == 'mentor') {
            $course = Course::where('mentor_id', auth()->user()->id)->findOrFail($id);
        } else {
            $course = Course::with('mentors')->findOrFail($id);
        }
        return view('admin.kursus.show', ['kursus' => $course,]);
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
        $categories = \App\Models\CourseCategories::all();
        return view('admin.kursus.edit', ['kursus' => $course, 'categories' => $categories]);
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
                'url_kursus' => 'nullable|string',
                'category_id' => 'nullable|exist:course_categories,id'
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
            Storage::delete([$course->thumbnail, $course->poster]);
            $course->mentors()->detach();
            $course->delete();
            return redirect()->route('admin.kursus')->with('success', 'Kursus berhasil Dihapus');
        }else{
            return redirect()->route('admin.kursus')->with('error', 'Kursus Gagal Dihapus');
        }
    }
}
