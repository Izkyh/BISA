@extends('layouts.media')

@section('title', 'Video - TIBA Surabaya')

@section('content')
    <div class="video-header">
        <h2 class="section-title">Galeri Video</h2>
        <p class="section-subtitle">Belajar Bahasa Isyarat Indonesia (BISINDO)</p>
        <p class="section-description">Pelajari bahasa isyarat dasar untuk berkomunikasi dengan teman tuli dan tingkatkan inklusivitas dalam masyarakat melalui koleksi video pembelajaran kami.</p>
    </div>

    {{-- Video Search Bar --}}
    <div class="video-search-bar mb-4">
        <div class="input-group">
            <input type="text" id="videoSearchInput" class="form-control" placeholder="Cari video...">
            <button class="btn btn-outline-secondary" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>

    <div id="video-list" class="row g-4">
        @forelse($videos as $video)
            <div class="col-md-6 video-card-col">
                <div class="video-card">
                    @php
                        // Extract YouTube Video ID
                        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video->youtube_url, $matches);
                        $videoId = $matches[1] ?? null;
                    @endphp

                    @if($videoId)
                        <iframe
                            src="https://www.youtube.com/embed/{{ $videoId }}"
                            title="{{ $video->title }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    @else
                        <div class="video-placeholder">
                            <i class="fas fa-video"></i>
                        </div>
                    @endif

                    <div class="video-card-content">
                        <h6>{{ $video->title }}</h6>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Belum ada video yang tersedia.
                </div>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <nav>
        {{ $videos->links('pagination::bootstrap-5') }}
    </nav>
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
@endpush
