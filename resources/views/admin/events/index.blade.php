@extends('admin.layouts.app')
@section('title', 'Event')

@section('content')
<div class="ph">
    <div>
        <h4>Event</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Event</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Event
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success mb-3"><i class="bi bi-check-circle me-2"></i>{{ session('success') }}</div>
@endif

<div class="card-admin">
    <table class="tbl">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tanggal</th>   {{-- ✅ fix: pakai event_date --}}
                <th>Lokasi</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
            @php
                $catColor = match($event->category) {
                    'kelas'   => '#f59e0b',
                    'seminar' => '#22c55e',
                    default   => '#4f8cff',
                };
            @endphp
            <tr>
                <td style="color:var(--muted);">
                    {{ ($events->currentPage()-1)*$events->perPage()+$loop->iteration }}
                </td>
                <td style="font-weight:500;">{{ Str::limit($event->title, 40) }}</td>
                <td>
                    <span class="badge" style="background:{{ $catColor }}1a; color:{{ $catColor }};">
                        {{ ucfirst($event->category) }}
                    </span>
                </td>
                <td style="color:var(--muted); white-space:nowrap; font-size:.82rem;">
                    {{-- ✅ fix: $event->event_date --}}
                    {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                </td>
                <td style="color:var(--muted);">{{ Str::limit($event->location, 28) }}</td>
                <td>
                    @if($event->isUpcoming())
                        <span class="badge" style="background:#22c55e1a; color:#22c55e;">Upcoming</span>
                    @else
                        <span class="badge" style="background:#8892a41a; color:#8892a4;">Selesai</span>
                    @endif
                </td>
                <td class="text-center" style="white-space:nowrap;">
                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-warning btn-icon me-1">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger btn-icon"
                            onclick="return confirm('Hapus event ini?')">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center py-5" style="color:var(--muted);">
                <i class="bi bi-calendar-x d-block fs-2 mb-2"></i>Belum ada event
            </td></tr>
            @endforelse
        </tbody>
    </table>
    {{-- ✅ satu pagination saja --}}
    @if($events->hasPages())
    <div style="padding:14px 16px; border-top:1px solid var(--border); display:flex; justify-content:center;">
        {{ $events->links() }}
    </div>
    @endif
</div>
@endsection
