<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = Student::orderBy('id', 'DESC');
        if($request->has('name')){
            $students = $students->where('name', 'like', '%'.$request->name.'%');
        }
        if($request->has('email')){
            $students = $students->where('email', 'like', '%'.$request->email.'%');
        }
        if($request->has('phone')){
            $students = $students->where('phone', 'like', '%'.$request->phone.'%');
        }
        if($request->has('address')){
            $students = $students->where('address', 'like', '%'.$request->address.'%');
        }
        $students = $students->paginate(15);
        return view('admin.student.index', compact('students', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:students|max:255',
            'password' => 'required|confirmed|max:255',
            'phone' => 'required|min:10|max:15',
            'address' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => 'student'
        ]);
        // create user data
        if($request->hasFile('avatar')){
            // upload image
            $pathStoring = $request->file('avatar')->store('/assets/img/avatar', 'public');
            $user->avatar = $pathStoring;
        }
        $user->save();
        // create student data
        $student = Student::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $request->post('address'),
            'province_id' => $request->post('province_id'),
            'city_id' => $request->post('city_id'),
            'status' => 'active'
        ]);
        return redirect()->route('admin.student.show', $student->id)->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::with('user')->find($id);
        $validation = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:students|max:255',
            'password' => 'confirmed|max:255',
            'phone' => 'required|min:10|max:15',
            'address' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        $user = $student->user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => 'student'
        ]);
        // create user data
        if($request->hasFile('avatar')){
            // upload image
            $pathStoring = $request->file('avatar')->store('/assets/img/avatar', 'public');
            $user->avatar = $pathStoring;
        }
        $user->save();
        // create student data
        $student = $student->update([
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $request->post('address'),
            'province_id' => $request->post('province_id'),
            'city_id' => $request->post('city_id'),
            'status' => 'active'
        ]);
        return redirect()->route('admin.student.show', $student->id)->with('success', 'Student update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
