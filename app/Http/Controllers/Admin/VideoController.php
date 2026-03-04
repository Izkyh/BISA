<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->paginate(12);
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'youtube_url' => 'required|url', // ✅ fix: url → youtube_url
        ]);
        Video::create($request->only('title', 'youtube_url'));
        return redirect()->route('admin.videos.index')
            ->with('success', 'Video berhasil ditambahkan');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'youtube_url' => 'required|url', // ✅ fix: url → youtube_url
        ]);
        $video->update($request->only('title', 'youtube_url'));
        return redirect()->route('admin.videos.index')
            ->with('success', 'Video berhasil diupdate');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('admin.videos.index')
            ->with('success', 'Video berhasil dihapus');
    }
}
