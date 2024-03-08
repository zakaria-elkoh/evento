<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('Admin.Events.index', compact('events'));
    }
    /**
     * Display a listing of the resource.
     */
    public function showEventsRequests()
    {
        $events = Event::where('statu', 'pending')->get();
        return view('Admin.Events.events-requests', compact('events'));
    }
    /**
     * Display a listing of the resource.
     */
    public function acceptEvent(Event $event)
    {
        $event->update([
            'statu' => 'Accepted'
        ]);
        return back()->with('Event Accepted with success!');
    }
    /**
     * Display a listing of the resource.
     */
    public function rejectEvent(Event $event)
    {
        $event->update([
            'statu' => 'Rejected'
        ]);
        return back()->with('Event Rejected with success!');
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
    public function store(StoreEventRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back();
    }
}
