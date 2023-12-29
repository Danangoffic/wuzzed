<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoungeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $initModel = Blog::with('comments');
        if(auth()->user()->role == 'mentor'){
            $blogs = $init->where(['created_by' => auth()->user()->id])->latest()->get();
        }else{
            $blogs = $init->latest()->get();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
