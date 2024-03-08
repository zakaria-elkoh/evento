<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function reserve($id)
    {
        $user = User::findOrFail(auth()->id());
        $event = Event::findOrFail($id);


        // Check if the user is already associated with the event
        if ($user->events->contains($event)) {
            return redirect()->back()->with('warning', 'You have already reserved this event.');
        }

        if ($event->auto_accept == 0) {
            $user->events()->attach($event->id, ['statu' => 'Pending']);
            return redirect()->back()->with('message', 'Ordered successfully, please wait for the organizer to accept it!');
        }

        $user->events()->attach($event->id, ['statu' => 'Accepted']);
        $event->increment('total_reservations');

        return redirect()->route('ticket', $id);
        return redirect()->route('show.event', $id)->with('message', 'A reservation to this event were added with success!');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
        //
    }
}
