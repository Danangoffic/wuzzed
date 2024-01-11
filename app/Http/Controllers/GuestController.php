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

    public function detail_course()
    {
        return view('detail-course');
    }

    public function detail_webinar()
    {
        return view('detail-webinar');
    }
}
