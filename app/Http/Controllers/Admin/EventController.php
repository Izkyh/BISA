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
            'category'   => 'required|in:umum,kelas,seminar',
            'event_date' => 'required|date',                  
            'start_time' => 'required',
            'end_time'   => 'required',
            'location'   => 'required|string|max:255',
            'link'       => 'nullable|url',
            'donation_link' => 'nullable|url|required_if:is_donation_enabled,1',
            'image'      => 'nullable|image|max:5120',
        ]);

        $data = $request->except('image');
        $data['is_donation_enabled'] = $request->boolean('is_donation_enabled');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/events'), $filename);
            $data['image_path'] = 'events/' . $filename;
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
            'link'       => 'nullable|url',
            'donation_link' => 'nullable|url|required_if:is_donation_enabled,1',
            'image'      => 'nullable|image|max:5120',
        ]);

        $data = $request->except('image');
        $data['is_donation_enabled'] = $request->boolean('is_donation_enabled');

        if ($request->hasFile('image')) {
            if ($event->image_path) {
                $oldPath = public_path('images/' . $event->image_path);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/events'), $filename);
            $data['image_path'] = 'events/' . $filename;
        }

        $event->update($data);
        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diupdate');
    }

    public function destroy(Event $event)
    {
        if ($event->image_path) {
            $imagePath = public_path('images/' . $event->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $event->delete();
        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus');
    }
}
