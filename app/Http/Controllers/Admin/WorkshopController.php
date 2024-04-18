<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workshops = Workshop::with('category')->get();
        return view('admin.pages.workshops.index', compact('workshops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.workshops.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required',
            'image' => 'required',
            'status' => 'required|string',
        ]);
        $workshop = Workshop::create($request->except('_token'));
        if ($request->has('image')) {
            $workshop->clearMediaCollection('images');
            $workshop->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return redirect()->route('admin.workshops.index')->with('status', 'Workshop has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $workshop = Workshop::with('category')->find($id);
        return view('admin.pages.workshops.edit', compact('workshop', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required',
            'status' => 'required|string',
        ]);
        $workshop = Workshop::find($id);
        $workshop->update($request->except('_token', '_method'));
        if ($request->has('image')) {
            $workshop->clearMediaCollection('images');
            $workshop->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return redirect()->route('admin.workshops.index')->with('status', 'Workshop has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);
        $workshop = Workshop::find($id);
        $workshop->clearMediaCollection('images');
        $workshop->delete();
        return redirect()->route('admin.workshops.index')->with('status', 'Your workshop has been deleted.');
    }

    public function delete(string $id)
    {
        $workshop = Workshop::find($id);
        return view('admin.pages.workshops.delete', compact('workshop'));
    }
}
