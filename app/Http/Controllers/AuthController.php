<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\RegisterRequest;

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
        Log::info('masuk proses login', ['request' => $request->only('email', 'password')]);
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], true)) {
            Log::info('user attempt to process login is success!');
            Log::info('get user data from database by email, with load student, enrollments, and shopping carts');

            $user = \App\Models\User::with(['student', 'mentor', 'enrollments', 'shoppingCarts'])->where('email', $credentials['email'])->first();
            Log::info('login user with user data', ['user' => $user]);

            auth()->login($user, true);
            Log::info("login user with user data");
            $request->session()->regenerate();
            // generate token
            $token = Auth::user()->createToken('user-token-course-' . auth()->user()->id);
            $request->session()->put('token', $token->plainTextToken);

            if($request->has('next')){
                Log::info('redirect to next url', ['next' => $request->next]);
                return redirect($request->next);
            }
            Log::info('redirect to home');
            return redirect()->route('home');
        }
        return redirecit()->route('login')->with('loginError', 'Login failed!Email atau password salah!')->withInput();
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

    public function doRegister(RegisterRequest $request)
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        $credentials = $request->only([
            'name',
            'email',
            'password',
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
        $request->user()->tokens()->delete();
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    // USER PROFILE

    public function profile()
    {
        $data['user'] = Auth::user();
        return view('profile.user-profile', $data);
    }
}
