@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="ph">
    <div>
        <h4>Dashboard</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb"><li class="breadcrumb-item active">Overview</li></ol>
        </nav>
    </div>
    <small style="color:var(--muted);"><i class="bi bi-clock me-1"></i>{{ now()->translatedFormat('l, d F Y — H:i') }} WIB</small>
</div>

{{-- STAT CARDS --}}
<div class="row g-3 mb-4">
    @php
    $cards = [
        ['label'=>'Artikel',         'val'=>$stats['articles'],        'icon'=>'bi-file-earmark-richtext', 'color'=>'#4f8cff'],
        ['label'=>'Total Event',     'val'=>$stats['events'],          'icon'=>'bi-calendar2-event',       'color'=>'#22c55e'],
        ['label'=>'Event Upcoming',  'val'=>$stats['upcoming_events'], 'icon'=>'bi-calendar-check',        'color'=>'#f59e0b'],
        ['label'=>'Video',           'val'=>$stats['videos'],          'icon'=>'bi-play-circle-fill',      'color'=>'#ef4444'],
        ['label'=>'Board Member',    'val'=>$stats['board_members'],   'icon'=>'bi-diagram-3-fill',        'color'=>'#7c5cfc'],
        ['label'=>'Users',           'val'=>$stats['users'],           'icon'=>'bi-person-circle',         'color'=>'#06b6d4'],
    ];
    @endphp
    @foreach($cards as $c)
    <div class="col-6 col-md-4 col-xl-2">
        <div class="stat-card">
            <div class="stat-icon" style="background:{{ $c['color'] }}18;">
                <i class="bi {{ $c['icon'] }}" style="color:{{ $c['color'] }};"></i>
            </div>
            <div class="stat-num">{{ $c['val'] }}</div>
            <div class="stat-lbl">{{ $c['label'] }}</div>
        </div>
    </div>
    @endforeach
</div>

{{-- RECENT DATA --}}
<div class="row g-3">
    <div class="col-lg-6">
        <div class="card-admin">
            <div class="card-admin-header">
                <span><i class="bi bi-file-earmark-richtext me-2" style="color:var(--accent);"></i>Artikel Terbaru</span>
                <a href="{{ route('admin.articles.index') }}" class="btn btn-sm btn-secondary">Semua</a>
            </div>
            <table class="tbl">
                <thead><tr><th>Judul</th><th>Tanggal</th></tr></thead>
                <tbody>
                    @forelse($latestArticles as $a)
                    <tr>
                        <td>
                            <a href="{{ route('admin.articles.edit', $a) }}"
                               style="color:var(--text); text-decoration:none;">
                                {{ Str::limit($a->title, 42) }}
                            </a>
                        </td>
                        <td style="color:var(--muted); white-space:nowrap; font-size:.8rem;">
                            {{ $a->created_at->format('d M Y') }}
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="2" class="text-center py-4" style="color:var(--muted);">
                        <i class="bi bi-inbox d-block fs-3 mb-1"></i>Belum ada artikel
                    </td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card-admin">
            <div class="card-admin-header">
                <span><i class="bi bi-calendar2-event me-2" style="color:var(--success);"></i>Event Mendatang</span>
                <a href="{{ route('admin.events.index') }}" class="btn btn-sm btn-secondary">Semua</a>
            </div>
            <table class="tbl">
                <thead><tr><th>Event</th><th>Tanggal</th><th>Kategori</th></tr></thead>
                <tbody>
                    @forelse($upcomingEvents as $e)
                    @php
                        $color = match($e->category) {
                            'kelas'   => '#f59e0b',
                            'seminar' => '#22c55e',
                            default   => '#4f8cff',
                        };
                    @endphp
                    <tr>
                        <td>{{ Str::limit($e->title, 36) }}</td>
                        <td style="color:var(--muted); white-space:nowrap; font-size:.8rem;">
                            {{ \Carbon\Carbon::parse($e->event_date)->format('d M Y') }}
                        </td>
                        <td>
                            <span class="badge" style="background:{{ $color }}1a; color:{{ $color }};">
                                {{ ucfirst($e->category) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="text-center py-4" style="color:var(--muted);">
                        <i class="bi bi-calendar-x d-block fs-3 mb-1"></i>Tidak ada event mendatang
                    </td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
