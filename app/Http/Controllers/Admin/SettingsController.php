<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit(){
        $settings = Setting::find(1);
        // $settings->getMedia
        return view('admin.pages.settings.index');
    }

    public function update(Request $request){
        $settings = Setting::find(1);
        $request->validate([
            'phone_number' => [
                'nullable', // Make sure the field is present
                'numeric',
            ],
            'email' => [
                'nullable',
                'email', // Built-in validation for email format
            ],
            'whatsapp' => [
                'nullable', // Allow empty value
                'numeric',
            ],
            'linkedin' => [
                'nullable',
                'url', // Validate as a URL
                'starts_with:https://www.linkedin.com/', // Enforce specific format (optional)
            ],
            'facebook' => [
                'nullable',
                'url', // Validate as a URL
                'starts_with:https://www.facebook.com/', // Enforce specific format (optional)
            ],
            'instagram' => [
                'nullable',
                'url',
                'starts_with:https://www.instagram.com/', // Enforce specific format (optional)
            ],
            'tiktok' => [
                'nullable',
                'url',
                'starts_with:https://www.tiktok.com/', // Enforce specific format (optional)
            ],
        ]);

        if ($request->has('logo')) {
            $settings->clearMediaCollection('logo');
            $settings->addMediaFromRequest('logo')->usingName('logo')->toMediaCollection('logo');
        }

        if ($request->has('favicon')) {
            $settings->clearMediaCollection('favicon');
            $settings->addMediaFromRequest('favicon')->usingName('favicon')->toMediaCollection('favicon');
        }

        $settings->update($request->except('_token'));

        return redirect()->back()->with('status', 'The settings has been updated.');
    }
}
