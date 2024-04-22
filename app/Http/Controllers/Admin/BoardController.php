<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Category;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boards =  Board::with('category')->get();
        return view('admin.pages.boards.index', compact('boards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.pages.boards.create', compact('categories'));
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
        $board = Board::create($request->except('_token'));
        if ($request->has('image')) {
            $board->clearMediaCollection('images');
            $board->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return redirect()->route('admin.boards.index')->with('status', 'Board has been add success');
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
        $board = Board::with('category')->find($id);
        $categories = Category::where('status', 1)->get();
        return view('admin.pages.boards.edit', compact('board', 'categories'));
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
        $board = Board::find($id);
        $board->update($request->except('_token', '_method'));
        if ($request->has('image')) {
            $board->clearMediaCollection('images');
            $board->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return redirect()->route('admin.boards.index')->with('status', 'board has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);
        $board = Board::find($id);
        $board->clearMediaCollection('images');
        $board->delete();
        return redirect()->route('admin.boards.index')->with('status', 'The board has been deleted.');
    }
    
    public function delete(string $id)
    {
        $board = Board::find($id); 
        return view('admin.pages.boards.delete', compact('board'));
    }
}
