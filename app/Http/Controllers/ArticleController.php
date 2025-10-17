<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);

        // Data untuk sidebar
        $popularArticles = Article::orderBy('created_at', 'desc')->take(3)->get();
        $upcomingEvents = Event::where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        return view('articles.index', compact('articles', 'popularArticles', 'upcomingEvents'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        // Data untuk sidebar
        $popularArticles = Article::where('id', '!=', $article->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $upcomingEvents = Event::where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        return view('articles.show', compact('article', 'popularArticles', 'upcomingEvents'));
    }
}
