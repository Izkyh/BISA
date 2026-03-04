<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Event;
use App\Models\Video;
use App\Models\BoardMember;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'articles'        => Article::count(),
            'events'          => Event::count(),
            'upcoming_events' => Event::where('event_date', '>=', now())->count(),
            'videos'          => Video::count(),
            'board_members'   => BoardMember::count(),
            'users'           => User::count(),
        ];

        $latestArticles  = Article::latest()->take(5)->get();
        $upcomingEvents  = Event::upcoming()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestArticles', 'upcomingEvents'));
    }
}
