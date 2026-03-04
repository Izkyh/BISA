<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'category'   => 'required|in:umum,kelas,seminar', // ✅ fix: sesuai model
            'event_date' => 'required|date',                  // ✅ fix: date → event_date
            'start_time' => 'required',
            'end_time'   => 'required',
            'location'   => 'required|string|max:255',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/events');
            $data['image_path'] = str_replace('public/', '', $path);
        }

        Event::create($data);
        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil ditambahkan');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'category'   => 'required|in:umum,kelas,seminar',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time'   => 'required',
            'location'   => 'required|string|max:255',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($event->image_path) Storage::delete('public/' . $event->image_path);
            $path = $request->file('image')->store('public/events');
            $data['image_path'] = str_replace('public/', '', $path);
        }

        $event->update($data);
        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diupdate');
    }

    public function destroy(Event $event)
    {
        if ($event->image_path) Storage::delete('public/' . $event->image_path);
        $event->delete();
        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus');
    }
}
