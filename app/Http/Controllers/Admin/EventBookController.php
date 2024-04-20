<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventBook;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class EventBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('events')->get();


        $usersWithEvents = $users->filter(function ($user) {
            return $user->events->isNotEmpty();
        });


        // return $usersWithEvents;
        return view('admin.pages.books.index', compact('usersWithEvents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        EventBook::create([
            'user_id' => auth()->user()->id,
            'event_id' => $request->event_id
        ]);
        return  redirect()->back()->with(['status' => 'Event has been booked']);
        // return $hasBooked;
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = EventBook::where('event_id', $id)->delete();
        $event->clearMediaCollection('images');
        return redirect()->back()->with(['status' => 'Event has been cancelled']);
    }
}
