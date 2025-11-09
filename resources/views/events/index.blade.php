@extends('layouts.media')

@section('title', 'Kegiatan Komunitas - TIBA Surabaya')

@section('content')
    <h1 class="section-title">Kegiatan Komunitas</h1>

    {{-- Video Search Bar --}}
    <div class="video-search-bar mb-4">
        <div class="input-group">
            <input type="text" id="videoSearchInput" class="form-control" placeholder="Cari video...">
            <button class="btn btn-outline-secondary" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>

    <div class="d-flex flex-column gap-4">
        @forelse($events as $event)
            <div class="event-card">
                <div class="event-card-image">
                    @if($event->image_path)
                        <img src="{{ Storage::url($event->image_path) }}" alt="{{ $event->title }}">
                    @else
                        <img src="{{ asset('foto/placeholder.jpg') }}" alt="{{ $event->title }}">
                    @endif
                </div>
                <div class="event-card-content">
                    <h2>{{ $event->title }}</h2>
                    <p>{{ Str::limit($event->title, 100) }}</p>

                    <div class="card-meta">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ $event->location }}</span>
                    </div>

                    <div class="card-meta">
                        <i class="fa-regular fa-clock"></i>
                        <span>
                            {{ $event->event_date->format('l, d F Y') }},
                            {{ $event->start_time->format('H:i') }} - {{ $event->end_time->format('H:i') }} WIB
                        </span>
                    </div>

                    <div class="card-actions">
                        @if($event->link)
                            <a href="{{ $event->link }}" target="_blank" class="btn btn-{{ $event->category == 'umum' ? 'blue' : ($event->category == 'seminar' ? 'green' : 'yellow') }}">
                                @if($event->category == 'seminar')
                                    Daftar Seminar
                                @elseif($event->category == 'kelas')
                                    Daftar Kelas
                                @else
                                    Gabung
                                @endif
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                Belum ada kegiatan yang tersedia.
            </div>
        @endforelse
    </div>

    {{-- Pagination (if needed) --}}
    @if($events->hasPages())
        <nav>
            {{ $events->links('pagination::bootstrap-5') }}
        </nav>
    @endif
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const videoSearchInput = document.getElementById('videoSearchInput');
        const videoCards = document.querySelectorAll('.video-card-col');

        if (videoSearchInput) {
            videoSearchInput.addEventListener('input', function() {
                const searchTerm = videoSearchInput.value.toLowerCase().trim();
                videoCards.forEach(function(col) {
                    const videoTitle = col.querySelector('.video-card-content h6').textContent.toLowerCase();
                    if (videoTitle.includes(searchTerm)) {
                        col.style.display = 'block';
                    } else {
                        col.style.display = 'none';
                    }
                });
            });
        }
    });
</script>
