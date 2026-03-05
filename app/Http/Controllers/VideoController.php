<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Article;
use App\Models\Event;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->paginate(8);

        // Data untuk sidebar
        $popularArticles = Article::latest()->take(5)->get();
        $upcomingEvents  = Event::where('event_date', '>=', now())
                                ->orderBy('event_date')
                                ->take(5)
                                ->get();

        return view('videos.index', compact('videos', 'popularArticles', 'upcomingEvents'));
    }
}
