<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit() {
        return view('admin.pages.about.edit');
    }
    public function update(Request $request){
        $request->validate([
            'about_us' => 'string|min:50',
            'mission' => 'string|min:50',
            'vision' => 'string|min:50',
            'value' => 'string|min:50',
        ],
        [
            'about_us.min' => 'The About Us section is too short.',
            'mission.min' => 'The mission section is too short.',
            'vision.min' => 'The vision section is too short.',
            'value.min' => 'The value section is too short.',
        ]);
        $about = About::find(1);
        $about->update($request->except('_token'));
        return redirect()->back()->with('status', 'About Us has been updated successfully.');
    }
}
