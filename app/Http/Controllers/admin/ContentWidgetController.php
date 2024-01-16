<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContentWidget;
use Illuminate\Http\Request;

class ContentWidgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = ContentWidget::all();
        return view('admin.settings.content-widgets.index', compact('contents'));
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
    public function show(ContentWidget $contentWidget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContentWidget $contentWidget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContentWidget $contentWidget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContentWidget $contentWidget)
    {
        //
    }
}
