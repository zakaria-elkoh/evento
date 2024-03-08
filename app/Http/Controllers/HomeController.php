<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

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
            ->paginate(9);
        $categories = Category::all();
        return view('index', compact('events', 'categories'));
    }

    public function search(Request $request)
    {
        $category_id = $request->query('category');
        $title = $request->query('title');

        if ($category_id != 'all') {
            $events = Event::where('category_id', $category_id)
                ->where('title', 'like', '%' . $title . '%')
                ->where('date', '>', now())
                ->with('category')
                ->get();
        } else {
            $events = Event::with('category')
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
        return view('show-event', compact('event', 'recent_eventes'));
    }
}
