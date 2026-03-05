@extends('layouts.media')

@section('title', 'Kegiatan Komunitas - TIBA Surabaya')

@section('content')
    <h1 class="section-title with-border">Kegiatan <span>Komunitas</span></h1>
    <p class="section-description">Ikuti berbagai kegiatan TIBA Surabaya — kelas BISINDO, seminar aksesibilitas, dan acara komunitas lainnya.</p>

    {{-- Search Bar --}}
    <div class="video-search-bar mb-4">
        <div class="input-group">
            <input type="text"
                   id="eventSearchInput"
                   class="form-control"
                   placeholder="Cari kegiatan berdasarkan judul atau lokasi...">
            <button class="btn" type="button" id="eventSearchBtn">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <div id="eventSearchInfo" class="search-info mt-2" style="display:none;">
            <small class="d-flex align-items-center justify-content-between w-100 gap-2">
                <span id="eventSearchInfoText"></span>
                <button type="button" id="eventClearSearch" class="clear-search">
                    <i class="fas fa-times"></i> Reset
                </button>
            </small>
        </div>
    </div>

    {{-- Filter Kategori --}}
    <div class="filter-tabs mb-4">
        <button class="filter-btn active" data-category="all">Semua</button>
        <button class="filter-btn" data-category="umum">Umum</button>
        <button class="filter-btn" data-category="kelas">Kelas</button>
        <button class="filter-btn" data-category="seminar">Seminar</button>
    </div>

    {{-- Event List --}}
    <div class="d-flex flex-column gap-4" id="eventList">
        @forelse($events as $event)
            <div class="event-card"
                 data-title="{{ strtolower($event->title) }} {{ strtolower($event->location ?? '') }}"
                 data-category="{{ $event->category }}">

                <div class="event-card-image">
                    @if($event->image_path)
                        <img src="{{ Storage::url($event->image_path) }}"
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
                <p>Belum ada kegiatan yang tersedia.</p>
            </div>
        @endforelse

        {{-- No result state --}}
        <div id="eventNoResult" class="empty-state" style="display:none;">
            <i class="fa-solid fa-search"></i>
            <p>Tidak ada kegiatan yang cocok dengan pencarian.</p>
        </div>
    </div>

    {{-- Pagination --}}
    @if($events->hasPages())
        <nav class="mt-4">
            {{ $events->links('vendor.pagination.events') }}
        </nav>
    @endif

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput  = document.getElementById('eventSearchInput');
    const clearBtn     = document.getElementById('eventClearSearch');
    const searchInfo   = document.getElementById('eventSearchInfo');
    const searchInfoTxt = document.getElementById('eventSearchInfoText');
    const noResult     = document.getElementById('eventNoResult');
    const filterBtns   = document.querySelectorAll('.filter-btn[data-category]');

    let currentCategory = 'all';
    let currentTerm     = '';

    function applyFilters() {
        const cards = document.querySelectorAll('#eventList .event-card');
        let visible = 0;

        cards.forEach(function (card) {
            const title    = card.getAttribute('data-title') || '';
            const category = card.getAttribute('data-category') || '';

            const matchSearch   = currentTerm === '' || title.includes(currentTerm);
            const matchCategory = currentCategory === 'all' || category === currentCategory;

            if (matchSearch && matchCategory) {
                card.style.display = 'flex';
                visible++;
            } else {
                card.style.display = 'none';
            }
        });

        // No result state
        if (noResult) {
            noResult.style.display = visible === 0 ? 'block' : 'none';
        }

        // Search info
        if (currentTerm) {
            searchInfoTxt.textContent = visible + ' kegiatan ditemukan untuk "' + currentTerm + '"';
            searchInfo.style.display  = 'block';
        } else {
            searchInfo.style.display  = 'none';
        }
    }

    // Search input
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            currentTerm = this.value.toLowerCase().trim();
            applyFilters();
        });

        searchInput.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                this.value  = '';
                currentTerm = '';
                applyFilters();
            }
        });
    }

    // Clear button
    if (clearBtn) {
        clearBtn.addEventListener('click', function () {
            if (searchInput) searchInput.value = '';
            currentTerm = '';
            applyFilters();
            if (searchInput) searchInput.focus();
        });
    }

    // Category filter buttons
    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            currentCategory = this.getAttribute('data-category');
            applyFilters();
        });
    });
});
</script>
@endpush
