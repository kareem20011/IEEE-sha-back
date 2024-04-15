<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use function Laravel\Prompts\password;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.pages.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function password(Request $request){
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|string',
        ]);


        if ($request->has('password')) {
            if(Hash::check(request()->current_password, auth()->user()->password)){
                $user = auth()->user();
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
                return redirect()->back()->with('status', 'Your password has been updated');
            }else{
                return redirect()->back()->with('error', 'The password you have entered is incorrect');
            }
        }

    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);
        

        User::where('id', $request->id)->delete();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');

    }

}
