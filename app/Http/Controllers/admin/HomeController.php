<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $dataCourse = \App\Models\Course::all()->count();
        $dataUser = \App\Models\User::where(['role' => 'user'])->get()->count();
        return view('admin.dashboard.index', ['dataCourse' => $dataCourse, 'dataUser' => $dataUser]);
    }
}
