<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Article;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::orderBy('event_date', 'asc');

        // Filter kategori server-side
        if ($request->filled('kategori') && $request->kategori !== 'all') {
            $query->where('category', $request->kategori);
        }

        // Filter search server-side
        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%')
                  ->orWhere('location', 'like', '%' . $keyword . '%');
            });
        }

        $events = $query->paginate(6)->withQueryString();

        $popularArticles = Article::orderByDesc('views')->latest()->take(5)->get();
        $upcomingEvents  = Event::where('event_date', '>=', now())
                                ->orderBy('event_date')
                                ->take(5)
                                ->get();

        return view('events.index', compact('events', 'popularArticles', 'upcomingEvents'));
    }
}
