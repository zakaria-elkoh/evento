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
        $events = Event::with('category')->get();
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
                ->with('category')
                ->get();
        } else {
            $events = Event::with('category')
                ->orwhere('title', 'like', '%' . $title . '%')
                ->get();
        }

        return response()->json($events);
    }

    public function showEvent(Event $event)
    {
        return view('show-event', compact('event'));
    }
}
