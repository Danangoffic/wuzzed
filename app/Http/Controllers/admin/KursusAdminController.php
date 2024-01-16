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
        $initData = Course::with(['category', 'mentors']);
        if(auth()->user()->role == 'mentor') {
            $dataKursus = $initData->where('mentor_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(15);
        } else {
            $dataKursus = $initData->orderBy('id', 'DESC')->paginate(15);
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
                'start_course_time' => 'nullable|string',
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
            // mix the start_course and start_course_time
            if ($request->post('start_course') && $request->post('start_course_time')) {
                $validatedData['start_course'] = Carbon::parse($request->post('start_course') . ' ' . $request->post('start_course_time'))->format('Y-m-d H:i:s');
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
        $mentors = Mentor::all();
        $course->load('mentors');
        $mentor = $course->mentors()->first();
        return view('admin.kursus.edit', ['kursus' => $course, 'categories' => $categories, 'mentors' => $mentors, 'mk' => $mentor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        // $course = Course::findOrFail($id);
        try {
            if($course){
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
                    'start_course_time' => 'nullable|string',
                    'url_kursus' => 'nullable|string',
                    'category_id' => 'required'
                ]);
                // validate mentor id
                $validated_mentor = Mentor::findOrFail($request->input('mentor_id'));
                if(!$validated_mentor){
                    return redirect()->route('admin.kursus.edit', $course->id)->with('error', 'Mentor tidak ditemukan');
                }
                $validatedData['slug'] = str($validatedData['name'])->slug()->value();
                if($request->hasFile('thumbnail')){
                    if($course->thumbnail!= null){
                        if(!Storage::delete($course->thumbnail)){
                            return redirect()->route('admin.kursus.edit', ['course' => $course])->with('error', 'Thumbnail gagal
                            dihapus')->withInput();
                        }
                    }
                    $thumbnail = $request->file('thumbnail')->store('thumbnail', ['disk' => 'public']);
                    if($thumbnail){
                        $validatedData['thumbnail'] = $thumbnail;
                    }else{
                        return redirect()->route('admin.kursus.edit', $course->id)->with('error', 'Thumbnail Gagal di upload');
                    }

                }
                if($request->hasFile('poster')){
                    if($course->poster!= null){
                        if(!Storage::delete($course->poster)){
                            return redirect()->route('admin.kursus.edit', ['course' => $course])->with('error', 'Poster gagal
                            dihapus')->withInput();
                        }
                    }
                    $poster = $request->file('poster')->store('poster', ['disk' => 'public']);
                    if($poster){
                        $validatedData['poster'] = $poster;
                    }else{
                        return redirect()->route('admin.kursus.edit', $course->id)->with('error', 'Poster gagal di upload');
                    }
                }

                // update mentor course data
                $mentor_course = MentorsCourse::where('course_id', $course->id)->first();
                if($mentor_course){
                    $mentor_course->mentor_id = $request->input('mentor_id');
                    $mentor_course->update();
                }else{
                    MentorsCourse::create([
                        'mentor_id' => $request->input('mentor_id'),
                        'course_id' => $course->id
                    ]);
                }


                $course->update($validatedData);
                return redirect()->route('admin.kursus.show', $course->id)->with('success', 'Kursus berhasil Diupdate');
            }else{
                return redirect()->route('admin.kursus.edit', ['course' => $course])->with('error', 'Kursus Gagal Diupdate');
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('admin.kursus.edit', ['course' => $course])->with('error', 'Kursus Gagal Diupdate karena ' . $th->getMessage());
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
