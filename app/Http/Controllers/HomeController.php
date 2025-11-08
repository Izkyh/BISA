<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 3 artikel terbaru (tanpa filter)
        $latestArticles = Article::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

       
        $latestEvents = Event::orderBy('event_date', 'desc')
            ->take(3)
            ->get();

        return view('welcome', compact('latestArticles', 'latestEvents'));
    }
}
