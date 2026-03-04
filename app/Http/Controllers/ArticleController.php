<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
{
    $articles = Article::orderBy('created_at', 'desc')
        ->paginate(4)
        ->withQueryString()
        ->onEachSide(1);

    // Sidebar sudah di-handle View Composer
    return view('articles.index', compact('articles'));
}

public function show($slug)
{
    $article = Article::where('slug', $slug)->firstOrFail();

    return view('articles.show', compact('article'));
}
}
