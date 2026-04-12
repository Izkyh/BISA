<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaGalleryController extends Controller
{
    // ──────────────────────────────────────────────────────────────
    // Month map (slug → label + number)
    // ──────────────────────────────────────────────────────────────
    private function monthMap(): array
    {
        return [
            1  => 'Januari',
            2  => 'Februari',
            3  => 'Maret',
            4  => 'April',
            5  => 'Mei',
            6  => 'Juni',
            7  => 'Juli',
            8  => 'Agustus',
            9  => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
    }

    // ──────────────────────────────────────────────────────────────
    // INDEX – grid semua tahun, setiap tahun punya 12 bulan
    // ──────────────────────────────────────────────────────────────
    public function index()
    {
        // Ambil semua data: cover (first image) + count per year+month
        $allGalleries = MediaGallery::orderBy('year', 'desc')
            ->orderBy('month')
            ->orderBy('id')
            ->get(['id', 'image_path', 'year', 'month', 'created_at']);

        // Group: [ year => [ month => ['count', 'cover'] ] ]
        $grouped = [];
        foreach ($allGalleries as $gallery) {
            $y = $gallery->year  ?: (int) $gallery->created_at->format('Y');
            $m = $gallery->month ?: (int) $gallery->created_at->format('n');

            if (!isset($grouped[$y][$m])) {
                $grouped[$y][$m] = ['count' => 0, 'cover' => null];
            }
            $grouped[$y][$m]['count']++;
            if ($grouped[$y][$m]['cover'] === null) {
                $grouped[$y][$m]['cover'] = asset('images/' . $gallery->image_path);
            }
        }

        // Sort years descending
        krsort($grouped);

        $monthMap   = $this->monthMap();
        $currentYear = now()->year;

        return view('admin.media_galleries.index', compact('grouped', 'monthMap', 'currentYear'));
    }

    // ──────────────────────────────────────────────────────────────
    // SHOW – semua foto untuk tahun + bulan tertentu
    // ──────────────────────────────────────────────────────────────
    public function show(int $year, int $month)
    {
        abort_if($month < 1 || $month > 12, 404);

        $galleries = MediaGallery::where('year', $year)
            ->where('month', $month)
            ->latest()
            ->paginate(18);

        $monthMap  = $this->monthMap();
        $monthName = $monthMap[$month] ?? '-';

        return view('admin.media_galleries.show', compact(
            'galleries', 'year', 'month', 'monthName', 'monthMap'
        ));
    }

    // ──────────────────────────────────────────────────────────────
    // CREATE
    // ──────────────────────────────────────────────────────────────
    public function create(Request $request)
    {
        $monthMap    = $this->monthMap();
        $defaultYear = (int) ($request->year  ?? now()->year);
        $defaultMonth= (int) ($request->month ?? now()->month);

        return view('admin.media_galleries.create', compact('monthMap', 'defaultYear', 'defaultMonth'));
    }

    // ──────────────────────────────────────────────────────────────
    // STORE
    // ──────────────────────────────────────────────────────────────
    public function store(Request $request)
    {
        $request->validate([
            'images'   => 'required|array|min:1',
            'images.*' => 'image|max:5120',
            'year'     => 'required|integer|min:2000|max:2100',
            'month'    => 'required|integer|min:1|max:12',
        ]);

        $this->ensureImageDirectoryExists();

        foreach ($request->file('images') as $file) {
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/media_galleries'), $filename);

            MediaGallery::create([
                'image_path' => 'media_galleries/' . $filename,
                'year'       => (int) $request->year,
                'month'      => (int) $request->month,
            ]);
        }

        return redirect()->route('admin.media-galleries.show', [$request->year, $request->month])
            ->with('success', count($request->file('images')) . ' foto berhasil diupload');
    }

    // ──────────────────────────────────────────────────────────────
    // EDIT
    // ──────────────────────────────────────────────────────────────
    public function edit(MediaGallery $mediaGallery)
    {
        $monthMap = $this->monthMap();
        return view('admin.media_galleries.edit', compact('mediaGallery', 'monthMap'));
    }

    // ──────────────────────────────────────────────────────────────
    // UPDATE
    // ──────────────────────────────────────────────────────────────
    public function update(Request $request, MediaGallery $mediaGallery)
    {
        $request->validate([
            'image' => 'nullable|image|max:5120',
            'year'  => 'required|integer|min:2000|max:2100',
            'month' => 'required|integer|min:1|max:12',
        ]);

        $data = [
            'year'  => (int) $request->year,
            'month' => (int) $request->month,
        ];

        if ($request->hasFile('image')) {
            $this->ensureImageDirectoryExists();

            if ($mediaGallery->image_path) {
                $oldPath = public_path('images/' . $mediaGallery->image_path);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $file     = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/media_galleries'), $filename);
            $data['image_path'] = 'media_galleries/' . $filename;
        }

        $mediaGallery->update($data);

        return redirect()->route('admin.media-galleries.show', [$mediaGallery->year, $mediaGallery->month])
            ->with('success', 'Foto berhasil diupdate');
    }

    // ──────────────────────────────────────────────────────────────
    // DESTROY
    // ──────────────────────────────────────────────────────────────
    public function destroy(MediaGallery $mediaGallery)
    {
        $year  = $mediaGallery->year;
        $month = $mediaGallery->month;

        if ($mediaGallery->image_path) {
            $imagePath = public_path('images/' . $mediaGallery->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $mediaGallery->delete();

        return redirect()->route('admin.media-galleries.show', [$year, $month])
            ->with('success', 'Foto berhasil dihapus');
    }

    // ──────────────────────────────────────────────────────────────
    // Helper
    // ──────────────────────────────────────────────────────────────
    private function ensureImageDirectoryExists(): void
    {
        $directory = public_path('images/media_galleries');
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
    }
}
