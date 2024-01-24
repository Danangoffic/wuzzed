<?php

namespace App\Http\Controllers\admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $settings = Setting::query();
        if ($request->has('group')) {
            $settings->where('group', 'like', '%' . $request->group . '%');
        }
        if ($request->has('parameter')) {
            $settings->where('parameter', 'like', '%' . $request->parameter . '%');
        }
        if ($request->has('value')) {
            $settings->where('value', 'like', '%' . $request->value . '%');
        }
        if ($request->has('status')) {
            $settings->where('status', $request->status);
        }
        $settings = $settings->paginate(15);
        return view('admin.settings.index', compact('settings', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'group' => 'required|string|max:255',
            'parameter' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);
        Setting::create($data);
        return redirect()->back()->with('success', 'Setting created successfully');
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
        $setting = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $setting = Setting::findOrFail($id);
        $data = $request->validate([
            'group' => 'required|string|max:255',
            'parameter' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);
        $setting->update($data);
        return redirect()->back()->with('success', 'Setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();
        return redirect()->back()->with('success', 'Setting Deleted successfully');
    }
}
