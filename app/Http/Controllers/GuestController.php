<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }



    public function course()
    {
        return view('profile.user-profile');
    }
}
