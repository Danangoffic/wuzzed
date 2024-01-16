<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\CourseCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CourseCategories::with('courses')->get();
        return view('admin.kursus.kategori.index', compact('categories'));
    }

    public function get_by_api(Request $request)
    {
        return response->json($categories = CourseCategories::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kursus.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string'
        ]);

        $slug = str($request->post('name'))->slug();
        $validatedData['slug'] = $slug;

        // Upload dan simpan thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $validatedData['thumbnail'] = $thumbnailPath;
        }

        CourseCategories::create($validatedData);

        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = CourseCategories::with('courses')->findOrFail($id);
        return view('admin.kursus.kategori.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = CourseCategories::findOrFail($id);
        return view('admin.kursus.kategori.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = CourseCategories::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string'
        ]);

        $slug = str($request->post('name'))->slug();
        $validatedData['slug'] = $slug;

        // Upload dan simpan thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $validatedData['thumbnail'] = $thumbnailPath;
        }
        $category->update($validatedData);
        return redirect()->route('admin.category.edit', $id)->with('success', 'Kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = CourseCategories::findOrFail($id);
        if ($category->thumbnail) {
            Storage::delete('public/thumbnails/' . $category->thumbnail);
        }

        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil dihapus');
    }
}
