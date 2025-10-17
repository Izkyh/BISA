<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Article;
use App\Models\Event;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('created_at', 'desc')->paginate(12);

        // Data untuk sidebar
        $popularArticles = Article::orderBy('created_at', 'desc')->take(3)->get();
        $upcomingEvents = Event::where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        return view('videos.index', compact('videos', 'popularArticles', 'upcomingEvents'));
    }
}
