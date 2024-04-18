<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CatigoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $counter = 0;
        $categories = Category::all();
        return view('admin.pages.categories.index', compact('categories', 'counter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',  // Title validation
            'status' => 'required', // Status validation with allowed values
        ]);
        Category::create($request->except('_token'));
        return redirect()->route('admin.categories.index')->with([
            'status' => 'Your event has been added.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('admin.pages.categories.delete', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Category::where('id', $id)->update($request->except('_token', '_method'));
        return redirect()->route('admin.categories.index')->with('status', 'Your category has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);
        Category::where('id', $id)->delete();
        return redirect()->route('admin.categories.index')->with('status', 'Your category has been deleted.');
    }
}
