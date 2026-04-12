<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use App\Models\MediaGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class MediaGalleryController extends Controller
{
    private function getMonthMap(): array
    {
        return [
            'january'   => ['number' => 1,  'label' => 'Januari'],
            'february'  => ['number' => 2,  'label' => 'Februari'],
            'march'     => ['number' => 3,  'label' => 'Maret'],
            'april'     => ['number' => 4,  'label' => 'April'],
            'may'       => ['number' => 5,  'label' => 'Mei'],
            'june'      => ['number' => 6,  'label' => 'Juni'],
            'july'      => ['number' => 7,  'label' => 'Juli'],
            'august'    => ['number' => 8,  'label' => 'Agustus'],
            'september' => ['number' => 9,  'label' => 'September'],
            'october'   => ['number' => 10, 'label' => 'Oktober'],
            'november'  => ['number' => 11, 'label' => 'November'],
            'december'  => ['number' => 12, 'label' => 'Desember'],
        ];
    }

    public function index()
    {
        if (!Schema::hasTable('media_galleries')) {
            $grouped = [];
        } else {
            $allGalleries = MediaGallery::orderBy('year', 'desc')
                ->orderBy('month', 'asc')
                ->get();

            $grouped = [];
            foreach ($allGalleries as $gallery) {
                if (!isset($grouped[$gallery->year][$gallery->month])) {
                    $grouped[$gallery->year][$gallery->month] = [
                        'count' => 0,
                        'cover' => asset('images/' . $gallery->image_path)
                    ];
                }
                $grouped[$gallery->year][$gallery->month]['count']++;
            }
            krsort($grouped);
        }

        $monthMap = $this->getMonthMap();
        $popularArticles = Article::orderByDesc('views')->latest()->take(5)->get();
        $upcomingEvents = Event::upcoming()->take(5)->get();

        return view('media-gallery.index', compact('grouped', 'monthMap', 'popularArticles', 'upcomingEvents'));
    }

    public function show(int $year, string $monthSlug)
    {
        $monthMap = $this->getMonthMap();
        abort_unless(isset($monthMap[$monthSlug]), 404);

        $monthData = $monthMap[$monthSlug];
        $monthNumber = $monthData['number'];

        $galleries = MediaGallery::where('year', $year)
            ->where('month', $monthNumber)
            ->latest()
            ->paginate(12);

        $popularArticles = Article::orderByDesc('views')->latest()->take(5)->get();
        $upcomingEvents = Event::upcoming()->take(5)->get();

        return view('media-gallery.show', compact(
            'galleries',
            'year',
            'monthSlug',
            'monthData',
            'popularArticles',
            'upcomingEvents'
        ));
    }
}
