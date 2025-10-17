<?php
// app/Providers/AppServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use App\Models\Article;
use App\Models\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register Blade Components
        Blade::component('navbar', \App\View\Components\Navbar::class);
        Blade::component('sidebar', \App\View\Components\Sidebar::class);
        Blade::component('footer', \App\View\Components\Footer::class);

        // View Composer untuk Sidebar
        View::composer('components.sidebar', function ($view) {
            $popularArticles = Article::orderBy('created_at', 'desc')
                ->take(3)
                ->get();

            $upcomingEvents = Event::where('event_date', '>=', now())
                ->orderBy('event_date', 'asc')
                ->take(3)
                ->get();

            $view->with([
                'popularArticles' => $popularArticles,
                'upcomingEvents' => $upcomingEvents
            ]);
        });

        // Global view data
        View::share('appName', config('app.name', 'TIBA Surabaya'));
    }
}
