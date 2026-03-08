@extends('layouts.media')

@section('title', 'Video - TIBA Surabaya')

@section('content')
    {{-- Header --}}
    <div class="video-header">
        <h2 class="section-title with-border">Galeri <span>Video</span></h2>
        <p class="section-subtitle">Belajar Bahasa Isyarat Indonesia (BISINDO)</p>
        <p class="section-description">
            Pelajari bahasa isyarat dasar untuk berkomunikasi dengan teman tuli dan
            tingkatkan inklusivitas melalui koleksi video pembelajaran kami.
        </p>
    </div>
    
    {{-- ── Search Bar ──────────────────────────────────────────────── --}}
    <div class="video-search-bar">
        <div class="input-group">
            <input type="text"
                   id="videoSearchInput"
                   class="form-control"
                   placeholder="Cari video BISINDO...">
            <button class="btn" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>

    {{-- ── Video Grid ───────────────────────────────────────────────── --}}
    <div id="video-list" class="row g-4">
        @forelse($videos as $video)
            @php
                preg_match(
                    '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/',
                    $video->youtube_url ?? '',
                    $matches
                );
                $videoId = $matches[1] ?? null;
            @endphp

            <div class="col-md-6 video-card-col" data-title="{{ strtolower($video->title) }}">
                <div class="video-card">

                    @if($videoId)
                        {{-- Lazy thumbnail — iframe muncul saat diklik --}}
                        <div class="yt-thumb-wrapper" data-videoid="{{ $videoId }}">
                            <img class="yt-thumb-img"
                                 src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg"
                                 alt="{{ $video->title }}"
                                 loading="lazy"
                                 onerror="this.src='https://img.youtube.com/vi/{{ $videoId }}/0.jpg'">
                            <button class="yt-play-btn" aria-label="Putar video {{ $video->title }}">
                                <i class="fas fa-play"></i>
                            </button>
                        </div>
                    @else
                        <div class="video-placeholder">
                            <i class="fas fa-video"></i>
                        </div>
                    @endif

                    <div class="video-card-content">
                        <h6>{{ $video->title }}</h6>

                        @if($video->description)
                            <p class="video-desc">{{ $video->description }}</p>
                        @endif

                        @if($video->created_at)
                            <div class="video-meta">
                                <i class="fa-regular fa-calendar"></i>
                                {{ $video->created_at->format('d M Y') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="empty-state">
                    <i class="fas fa-film"></i>
                    <p>Belum ada video yang tersedia.</p>
                </div>
            </div>
        @endforelse
    </div>

    {{-- No result state --}}
    <div id="videoNoResult">
        <i class="fas fa-search"></i>
        <p>Tidak ada video yang cocok dengan pencarian.</p>
    </div>

    {{-- Pagination --}}
    @if($videos->hasPages())
        <nav class="mt-4">
            {{ $videos->links('vendor.pagination.video') }}
        </nav>
    @endif

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── YouTube Lazy Load ──────────────────────────────────────────
    document.querySelectorAll('.yt-thumb-wrapper').forEach(function (wrapper) {
        wrapper.addEventListener('click', function () {
            const id = this.getAttribute('data-videoid');
            if (!id) return;

            const iframe = document.createElement('iframe');
            iframe.src         = 'https://www.youtube.com/embed/' + id + '?autoplay=1&rel=0';
            iframe.frameBorder = '0';
            iframe.allow       = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
            iframe.allowFullscreen = true;
            iframe.className   = 'yt-iframe';

            this.innerHTML = '';
            this.appendChild(iframe);
            this.style.cursor = 'default';
        });
    });

    // ── Search / Filter ────────────────────────────────────────────
    const searchInput = document.getElementById('videoSearchInput');
    const noResult    = document.getElementById('videoNoResult');

    if (!searchInput) return;

    searchInput.addEventListener('input', function () {
        const term  = this.value.toLowerCase().trim();
        const cards = document.querySelectorAll('#video-list .video-card-col');
        let visible = 0;

        cards.forEach(function (col) {
            const title = col.getAttribute('data-title') || '';
            const show  = term === '' || title.includes(term);
            col.style.display = show ? 'block' : 'none';
            if (show) visible++;
        });

        if (noResult) {
            noResult.style.display = (term !== '' && visible === 0) ? 'block' : 'none';
        }
    });

    searchInput.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            this.value = '';
            this.dispatchEvent(new Event('input'));
        }
    });

});
</script>
@endpush
