<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Article;
use App\Models\Event;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $query = Video::latest();

        if ($request->filled('kategori')) {
            $query->where('category', $request->kategori);
        }

        $videos = $query->paginate(8)->withQueryString();

        // Data untuk sidebar
        $popularArticles = Article::orderByDesc('views')->latest()->take(5)->get();
        $upcomingEvents  = Event::where('event_date', '>=', now())
                                ->orderBy('event_date')
                                ->take(5)
                                ->get();

        $categories = Video::getCategories();

        return view('videos.index', compact('videos', 'popularArticles', 'upcomingEvents', 'categories'));
    }
}
