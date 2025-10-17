<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use App\Models\Video;

class HomeController extends Controller
{
    public function index()
    {
        $latestArticles = Article::orderBy('created_at', 'desc')->take(3)->get();
        $latestEvents = Event::where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        return view('welcome', compact('latestArticles', 'latestEvents'));
    }
}
