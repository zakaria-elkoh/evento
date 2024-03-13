<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('statu', 'Accepted')
            ->where('date', '>', now())
            ->with('category')
            ->orderBy('id', 'DESC')
            ->paginate(9);

        $categories = Category::all();
        return view('index', compact('events', 'categories'));
    }

    public function banned(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('banned-page');
    }

    public function search(Request $request)
    {
        $category_id = $request->query('category');
        $title = $request->query('title');

        if ($category_id != 'all') {
            $events = Event::where('category_id', $category_id)
                ->where('statu', 'Accepted')
                ->where('title', 'like', '%' . $title . '%')
                ->where('date', '>', now())
                ->with('category')
                ->get();
        } else {
            $events = Event::with('category')
                ->where('statu', 'Accepted')
                ->where('date', '>', now())
                ->where('title', 'like', '%' . $title . '%')
                ->get();
        }

        foreach ($events as $event) {
            $event['image'] = $event->getFirstMediaUrl('images');
        }

        return response()->json($events);
    }

    public function showEvent(Event $event)
    {
        $recent_eventes = Event::take(3)->get();
        $accepted = false;
        $reservation = false;
        if (Auth::check()) {
            $reservation = Reservation::where('user_id', Auth::user()->id)
                ->where('event_id', $event->id)
                ->first();
        }
        if ($reservation && $reservation->statu == 'Accepted') {
            $accepted = true;
        }
        return view('show-event', compact('event', 'recent_eventes', 'accepted'));
    }
}
