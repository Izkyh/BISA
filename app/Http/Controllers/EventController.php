<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Article;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'asc')->paginate(10);

        // Data untuk sidebar
        $popularArticles = Article::latest()->take(5)->get();
        $upcomingEvents  = Event::where('event_date', '>=', now())
                                ->orderBy('event_date')
                                ->take(5)
                                ->get();

        return view('events.index', compact('events', 'popularArticles', 'upcomingEvents'));
    }
}
