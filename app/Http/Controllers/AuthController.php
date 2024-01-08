<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login', [
            'next' => $request->next,
        ]);
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // generate token
            $token = Auth::user()->createToken('user-token-course-' . Auth::user()->id);
            $request->session()->put('token', $token->plainTextToken);

            if($request->has('next')){
                return redirect($request->next);
            }
            return redirect()->route('home');
        }
        return back()->with('loginError', 'Login failed!')->withInput();
    }

    public function register(Request $request)
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('register', [
            'next' => $request->next,
        ]);
    }

    public function doRegister(Request $request)
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        // create as user role
        $credentials['role'] = 'student';
        $password = $credentials['password'];
        $credentials['password'] = bcrypt($password);

        try {
            $user = User::create($credentials);
            $credentials['user_id'] = $user->id;
            $student = Student::create($credentials);
            $request->session()->regenerate();
            Auth::login($user);
            if($request->has('next')){
                return redirect($request->next);
            }
            return redirect()->route('home');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('registerError', 'Register failed!' . $th->getMessage())->withInput();
        }
    }

    public function logout(Request $request)
    {
        if(Auth::check()){
            Auth::user()->currentAccessToken()->delete();
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    // USER PROFILE

    public function profile()
    {
        $data['user'] = Auth::user();
        $data['user']['role'] = $data['user']['role'];
        return view('profile.user-profile', $data);
    }
}
