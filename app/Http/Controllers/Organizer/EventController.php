<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('user_id', auth()->id())->get();
        return view('Organizer.Events.index', compact('events'));
    }
    /**
     * Display a listing of the resource.
     */
    public function acceptReservation(Reservation $reservation)
    {
        $reservation->update([
            'statu' => 'Accepted'
        ]);
        return back()->with('Reservation Accepted with success!');
    }
    /**
     * Display a listing of the resource.
     */
    public function rejectReservation(Reservation $reservation)
    {
        $reservation->update([
            'statu' => 'Rejected'
        ]);
        return back()->with('Reservation Rejected with success!');
    }
    /**
     * Display a listing of the resource.
     */
    public function showEventRequests(Event $event)
    {
        $requests = Reservation::with('user')->where('event_id', $event->id)->where('statu', 'pending')->get();
        // dd($requests);
        return view('Organizer.Events.requests', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Organizer.Events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'price' => $request->price,
            'location' => $request->location,
            'duration' => $request->duration,
            'total_places' => $request->total_places,
            'category_id' => $request->category_id,
            'auto_accept' => $request->auto_accept,
            'user_id' => Auth::id()
        ]);

        $event->addMediaFromRequest('event_image')->toMediaCollection('images');

        return redirect()->route('home')->with('message', 'The event was added with success!');
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
        $categories = Category::all();
        return view('Organizer.Events.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'price' => $request->price,
            'location' => $request->location,
            'duration' => $request->duration,
            'total_places' => $request->total_places,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('organizer.events.index');
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
