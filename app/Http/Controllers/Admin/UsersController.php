<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required|string|min:2',
            'role' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        if($request->has('images')){
            $old = $user->getFirstMedia('images');
            if ($old) {
                $old->delete();
            }
            $user->addMediaFromRequest('image')->usingName($user->name)->toMediaCollection('images');
        }
        session()->flash('success', 'User created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('admin.pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'role' => 'required|string',
        ]);
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        if($request->has('image')){
            $old = $user->getFirstMedia('images');
            if ($old) {
                $old->delete();
            }
            $user->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return redirect()->back()->with(['success' => 'Your account has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);
        // return $request;
        User::where('id', $id)->delete();
        session()->flash('success', 'User deleted successfully!');
        return redirect()->route('users.index');
    }
}
