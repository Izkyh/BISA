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
        $categories = Video::getCategories();

        return view('admin.videos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'youtube_url' => 'required|url',
            'category'    => 'required|in:' . implode(',', array_keys(Video::getCategories())),
        ]);
        Video::create($request->only('title', 'youtube_url', 'category'));
        return redirect()->route('admin.videos.index')
            ->with('success', 'Video berhasil ditambahkan');
    }

    public function edit(Video $video)
    {
        $categories = Video::getCategories();

        return view('admin.videos.edit', compact('video', 'categories'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'youtube_url' => 'required|url',
            'category'    => 'required|in:' . implode(',', array_keys(Video::getCategories())),
        ]);
        $video->update($request->only('title', 'youtube_url', 'category'));
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
