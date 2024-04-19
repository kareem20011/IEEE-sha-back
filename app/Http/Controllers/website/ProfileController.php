<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('website.pages.profile.edit', [
            'user' => $request->user(),
        ]);
    }


    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = User::find(auth()->user()->id);
        if ($request->has('image')) {
            $user->clearMediaCollection('images');
            $user->addMediaFromRequest('image')->toMediaCollection('images');
        }

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'Your profile has been updated');
    }




    public function password(Request $request){
        $request->validate([
            'current_password' => 'required|string|current_password',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|string',
        ]);


        $user = User::find(auth()->user()->id);
        if ($request->has('password')) {
            if(Hash::check(request()->current_password, auth()->user()->password)){
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
                return redirect()->back()->with('status', 'Your password has been updated');
            }else{
                return redirect()->back()->with('error', 'The password you have entered is incorrect');
            }
        }

    }







    public function destroy(Request $request)
    {
        $request->validate([
            'password_delete' => ['required', 'current_password'],
        ]);
        

        User::where('id', $request->id)->delete();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');

    }
}
