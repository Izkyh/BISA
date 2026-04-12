<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::latest();

        if ($request->filled('kategori')) {
            $query->where('category', $request->kategori);
        }

        $articles = $query->paginate(6)->withQueryString();

        $popularArticles = Article::orderByDesc('views')->latest()->take(5)->get();
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
        $article->increment('views');
        $article->refresh();

        $popularArticles = Article::where('slug', '!=', $slug)
            ->orderByDesc('views')
            ->latest()
            ->take(5)
            ->get();
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

    public function pingTracker(Request $request, string $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        
        $cacheKey = 'article_' . $article->id . '_active_viewers';
        $viewers = Cache::get($cacheKey, []);
        
        // Gunakan session ID atau IP sebagai identifier unik
        $identifier = session()->getId() ?? $request->ip();
        
        // Update timestamp user ini
        $viewers[$identifier] = now()->timestamp;
        
        // Buang user yang tidak nge-ping dalam 30 detik terakhir
        $validTime = now()->subSeconds(30)->timestamp;
        $viewers = array_filter($viewers, function($timestamp) use ($validTime) {
            return $timestamp >= $validTime;
        });
        
        // Simpan kembali ke Cache, beri waktu expired 1 menit agar memori bersih
        Cache::put($cacheKey, $viewers, now()->addMinutes(1));
        
        return response()->json([
            'count' => max(1, count($viewers)) // Minimal 1 (krn memuat dirinya sendiri)
        ]);
    }
}
