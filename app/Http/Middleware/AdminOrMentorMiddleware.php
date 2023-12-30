<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOrMentorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Periksa apakah pengguna memiliki peran admin atau mentor
        if ($user && ($user->role === 'admin' || $user->role === 'mentor')) {
            return $next($request);
        }

        // Redirect atau berikan respons lain sesuai kebutuhan
        return redirect()->route('admin.login')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
