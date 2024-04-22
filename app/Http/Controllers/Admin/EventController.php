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
        $counter = 0;
        $events = Event::all();
        return view('admin.pages.events.index', compact('events', 'counter'));
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
            'number_of_tickets' => 'nullable|integer|min:1', // Number of tickets validation
            'status' => 'required', // Status validation with allowed values
          ]);
        $event = Event::create($request->except('_token', 'number_of_tickets'));
        if($request->has('image')){
            $event->clearMediaCollection('images');
            $event->addMediaFromRequest('image')->usingName($event->title)->toMediaCollection('images');
        }
        return redirect()->route('admin.events.index')->with([
            'status' => 'Your event has been added.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        return view('admin.pages.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::find($id);
        return view('admin.pages.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',  // Title validation
            'description' => 'required|string',   // Description validation
            'expiry_date' => 'date',      // date validation
            'number_of_tickets' => 'nullable|integer|min:1', // Number of tickets validation
            'status' => 'required', // Status validation with allowed values
          ]);
        $event = Event::find($id);
        if($request->has('image')){
            $event->clearMediaCollection('images');
            $event->addMediaFromRequest('image')->usingName($event->title)->toMediaCollection('images');
        }
        $event->update($request->except('_token', '_method', 'number_of_tickets'));
        return redirect()->route('admin.events.index')->with('status', 'Your event has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);
        $event = Event::find($id);
        $event->clearMediaCollection('images');
        $event->delete();
        return redirect()->route('admin.events.index')->with('status', 'Your event has been deleted.');
    }
    
    public function delete(string $id)
    {
        $event = Event::find($id);
        return view('admin.pages.events.delete', compact('event'));
    }
}
