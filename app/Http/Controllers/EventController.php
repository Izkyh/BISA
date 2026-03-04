<?php
namespace App\Http\Controllers;

use App\Models\Event;
// use Illuminate\Http\Request; // dihapus jika tidak dipakai

class EventController extends Controller
{
public function index()
{
    $events = Event::orderBy('event_date', 'desc')->paginate(10);

    return view('events.index', compact('events'));
}
}
