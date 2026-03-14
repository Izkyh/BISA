@extends('layouts.media')

@section('title', 'Kegiatan Komunitas - TIBA Surabaya')

@section('content')
    <h1 class="section-title with-border">Kegiatan <span>Komunitas</span></h1>
    <p class="section-description">Ikuti berbagai kegiatan TIBA Surabaya — kelas BISINDO, seminar aksesibilitas, dan acara komunitas lainnya.</p>

    {{-- Search Bar — sekarang submit ke server --}}
    <form method="GET" action="{{ route('events.index') }}" class="mb-4" id="eventSearchForm">
        {{-- Pertahankan filter kategori aktif saat search --}}
        @if(request('kategori'))
            <input type="hidden" name="kategori" value="{{ request('kategori') }}">
        @endif

        <div class="video-search-bar">
            <div class="input-group">
                <input type="text"
                       name="search"
                       id="eventSearchInput"
                       class="form-control"
                       value="{{ request('search') }}"
                       placeholder="Cari kegiatan berdasarkan judul atau lokasi...">
                <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        {{-- Info hasil search --}}
        @if(request('search'))
            <div class="search-info mt-2">
                <small class="d-flex align-items-center justify-content-between w-100 gap-2">
                    <span>{{ $events->total() }} kegiatan ditemukan untuk "{{ request('search') }}"</span>
                    <a href="{{ route('events.index', array_filter(['kategori' => request('kategori')])) }}"
                       class="clear-search">
                        <i class="fas fa-times"></i> Reset
                    </a>
                </small>
            </div>
        @endif
    </form>

    {{-- Filter Kategori — sekarang pakai link URL --}}
    <div class="filter-tabs mb-4">
        <a href="{{ route('events.index', array_filter(['search' => request('search')])) }}"
           class="filter-btn {{ !request('kategori') ? 'active' : '' }}">
            Semua
        </a>
        <a href="{{ route('events.index', array_filter(['kategori' => 'umum', 'search' => request('search')])) }}"
           class="filter-btn {{ request('kategori') == 'umum' ? 'active' : '' }}">
            Umum
        </a>
        <a href="{{ route('events.index', array_filter(['kategori' => 'kelas', 'search' => request('search')])) }}"
           class="filter-btn {{ request('kategori') == 'kelas' ? 'active' : '' }}">
            Kelas
        </a>
        <a href="{{ route('events.index', array_filter(['kategori' => 'seminar', 'search' => request('search')])) }}"
           class="filter-btn {{ request('kategori') == 'seminar' ? 'active' : '' }}">
            Seminar
        </a>
    </div>

    {{-- Event List --}}
    <div class="d-flex flex-column gap-4" id="eventList">
        @forelse($events as $event)
            <div class="event-card">

                <div class="event-card-image">
                    @if($event->image_path)
                        <img src="{{ asset('images/' . $event->image_path) }}"
                             alt="{{ $event->title }}"
                             loading="lazy"
                             onerror="this.src='{{ asset('foto/placeholder.jpg') }}'">
                    @else
                        <img src="{{ asset('foto/placeholder.jpg') }}"
                             alt="{{ $event->title }}">
                    @endif
                </div>

                <div class="event-card-content">
                    {{-- Badge Kategori --}}
                    <div class="mb-2">
                        <span class="badge
                            @if($event->category == 'kelas') bg-warning text-dark
                            @elseif($event->category == 'seminar') bg-success
                            @else bg-primary
                            @endif
                            rounded-pill px-3 py-1" style="font-size:0.75rem; font-weight:600;">
                            {{ ucfirst($event->category ?? 'Umum') }}
                        </span>
                    </div>

                    <h2>{{ $event->title }}</h2>

                    @if($event->description)
                        <p>{{ Str::limit($event->description, 120) }}</p>
                    @endif

                    <div class="card-meta">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ $event->location }}</span>
                    </div>

                    <div class="card-meta">
                        <i class="fa-regular fa-calendar"></i>
                        <span>{{ $event->event_date->format('l, d F Y') }}</span>
                    </div>

                    <div class="card-meta">
                        <i class="fa-regular fa-clock"></i>
                        <span>
                            {{ $event->start_time->format('H:i') }}
                            @if($event->end_time)
                                - {{ $event->end_time->format('H:i') }}
                            @endif
                            WIB
                        </span>
                    </div>

                    <div class="card-actions">
                        @if($event->link)
                            <a href="{{ $event->link }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="btn btn-{{ $event->category == 'umum' ? 'blue' : ($event->category == 'seminar' ? 'green' : 'yellow') }}">
                                @if($event->category == 'seminar')
                                    <i class="fa-solid fa-microphone-alt me-1"></i> Daftar Seminar
                                @elseif($event->category == 'kelas')
                                    <i class="fa-solid fa-chalkboard-teacher me-1"></i> Daftar Kelas
                                @else
                                    <i class="fa-solid fa-users me-1"></i> Gabung
                                @endif
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <i class="fa-regular fa-calendar-xmark"></i>
                <p>
                    @if(request('search') || request('kategori'))
                        Tidak ada kegiatan yang cocok dengan filter ini.
                    @else
                        Belum ada kegiatan yang tersedia.
                    @endif
                </p>
            </div>
        @endforelse
    </div>

    {{-- Pagination — otomatis akurat karena server-side --}}
    @if($events->hasPages())
        <nav class="mt-4">
            {{ $events->links('vendor.pagination.events') }}
        </nav>
    @endif

@endsection
