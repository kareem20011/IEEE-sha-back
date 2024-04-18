<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WorkshopsController extends Controller
{
    public function index(){
        $categories = Category::with('workshops')->get();
        // return $categories;
        return view('website.pages.workshops.index', compact('categories'));
    }
}
