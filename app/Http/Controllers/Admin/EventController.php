<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
// use Carbon\Doctrine\CarbonTypeConverter;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // use CarbonTypeConverter;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.pages.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',  // Title validation
            'description' => 'required|string',   // Description validation
            'expiry_date' => 'date',      // date validation
            'number_of_tickets' => 'required|integer|min:1', // Number of tickets validation
            'status' => 'required', // Status validation with allowed values
          ]);
        Event::create($request->except('_token'));
        return redirect()->back()->with([
            'status' => 'Your event has been added.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $time = Carbon::now();
        $event = Event::find(3);
        $event_time = $event->expiry_date;
        $ex = $time->diffInDays($event_time);
        if($ex < 1){
            $ex = "this event expaierd";
        }
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
        //
    }
}
