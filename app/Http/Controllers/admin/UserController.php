<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'DESC');
        if($request->has('nama')){
            $users = $users->where('name', 'like', '%'.$request->get('nama').'%');
        }
        if($request->has('email')){
            $users = $users->where('email', 'like', '%'.$request->get('email').'%');
        }
        if($request->has('role')){
            $users = $users->where('role', 'like', '%'.$request->get('role').'%');
        }
        $users = $users->paginate(15);
        return view('admin.user.index', compact('users', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credential = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email|max:255',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $credential['role'] = 'admin';
        if($request->hasFile('avatar')){
            $pathStoring = $request->file('avatar')->store('/assets/img/avatar', 'public');
            $credential['avatar'] = $pathStoring;
        }
        $user = User::create($credential);
        return redirect()->route('admin.user')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($user->avatar!=null){
            Storage::disk('public')->delete($user->avatar);
        }
        if($request->hasFile('avatar')){
            $pathStoring = $request->file('avatar')->store('/assets/img/avatar', 'public');
            $credential['avatar'] = $pathStoring;
        }
        if($request->has('password') && $request->has('password_confirmation')){
            if($request->post('password') == $request->post('password_confirmation')){
                $user->password = bcrypt($request->password);
            }
        }
        if($request->has('role')){
            $user->role = $request->role;
        }
        $user->save();
        return redirect()->route('admin.user.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::with(['student', 'mentor'])->findOrFail($id);
        if($user->role == 'mentor'){
            $user->mentor->delete();
        }else if($user->role == 'student'){
            $user->student->delete();
        }
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully');
    }
}
