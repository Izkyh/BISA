<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Article;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'desc')->paginate(10);

        // Data untuk sidebar
        $popularArticles = Article::orderBy('created_at', 'desc')->take(3)->get();
        $upcomingEvents = Event::where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        return view('events.index', compact('events', 'popularArticles', 'upcomingEvents'));
    }
}
