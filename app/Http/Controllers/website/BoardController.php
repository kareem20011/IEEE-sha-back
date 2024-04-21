<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        $categories = Category::with('boards')->get();
        // return $categories;
        return view('website.pages.board.index', compact('categories'));
    }
}
