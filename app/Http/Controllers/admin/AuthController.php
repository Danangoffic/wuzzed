<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('admin.auth.login');
    }

    public function doLogin(Request $request)
    {
        try {
            $credential = $request->validate([
                'email' => 'string|email|required',
                'password' => 'required'
            ]);
            $user = User::where(['email' => $request->post('email')])->first();
            if($user){
                $check_pass = Hash::check($request->post('password'), $user->password);
                if($check_pass){
                    if (Auth::attempt($credential)) {
                        Auth::user()->tokens()->delete();
                        $token = auth()->user()->createToken('auth_token');
                        $request->session()->regenerate();
                        session()->put('token', $token->plainTextToken);
                        return redirect()->intended('admin');
                    }
                    return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                    ])->onlyInput('email');
                }
            }else{
                return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
                ])->onlyInput('email');
            }
        } catch (\Throwable $th) {
            echo 'error with : ' . $th->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $cred = $request->validate([
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'name' => 'string|required|max:255',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $newPassword = Hash::make($request->post('password'));
            $role = 'admin';
            $data = [
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'password' => $newPassword,
                'role' => $role
            ];
            if($request->has('profession')){
                $data['profession'] = $request->post('profession');
            }
            if($request->hasFile('avatar')){
                $pathStoring = $request->file('avatar')->store('/assets/img/avatar', 'public');
                $data['avatar'] = $pathStoring;
            }
            $create = User::create($data);
            if($create){
                return redirect()->route('admin.register')->with('success', 'Sukses tambahkan user baru');
            }else{
                return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
                ])->withInput($request->all());
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
            // echo 'error with ' . $th->getMessage();
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
