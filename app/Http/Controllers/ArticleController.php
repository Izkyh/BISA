<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::latest();

        if ($request->filled('kategori')) {
            $query->where('category', $request->kategori);
        }

        $articles = $query->paginate(6)->withQueryString();

        $popularArticles = Article::latest()->take(5)->get();
        $upcomingEvents  = Event::where('event_date', '>=', now())
                                ->orderBy('event_date')
                                ->take(5)
                                ->get();

        return view('articles.index', compact(
            'articles',
            'popularArticles',
            'upcomingEvents'
        ));
    }

    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        $popularArticles = Article::latest()->where('slug', '!=', $slug)->take(5)->get();
        $upcomingEvents  = Event::where('event_date', '>=', now())
                                ->orderBy('event_date')
                                ->take(5)
                                ->get();

        return view('articles.show', compact(
            'article',
            'popularArticles',
            'upcomingEvents'
        ));
    }
}
