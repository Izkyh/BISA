@extends('layouts.media')

@section('title', 'Media Gallery - TIBA Surabaya')

@section('content')
<div class="gallery-container">
    <div class="gallery-header mb-5">
        <h1 class="display-5 fw-bold">Galeri Media</h1>
        <p class="text-muted">Kumpulan dokumentasi kegiatan dan momen Komunitas TIBA Surabaya.</p>
    </div>

    @if(empty($grouped))
        <div class="text-center py-5">
            <i class="fa-regular fa-images fa-4x text-muted mb-4"></i>
            <h3>Belum ada galeri</h3>
            <p class="text-muted">Silakan kembali lagi nanti untuk melihat pembaruan terbaru.</p>
        </div>
    @else
        @foreach($grouped as $year => $months)
            <div class="year-section mb-5">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <h2 class="fw-bold mb-0">{{ $year }}</h2>
                    <div class="flex-grow-1 border-bottom"></div>
                </div>
                
                <div class="row g-4">
                    @php
                        $monthNames = array_flip(array_map(fn($m) => $m['number'], $monthMap));
                    @endphp
                    @foreach($months as $monthNumber => $data)
                        @php
                            $monthSlug = $monthNames[$monthNumber];
                            $label = $monthMap[$monthSlug]['label'];
                        @endphp
                        <div class="col-md-4 col-sm-6">
                            <a href="{{ route('media-gallery.show', ['year' => $year, 'monthSlug' => $monthSlug]) }}" class="text-decoration-none">
                                <div class="month-card card shadow-sm h-100 overflow-hidden rounded-4 border-0 position-relative">
                                    <div class="ratio ratio-4x3">
                                        <img src="{{ $data['cover'] }}" class="card-img-top object-fit-cover transition w-100 h-100" alt="{{ $label }} {{ $year }}">
                                    </div>
                                    <div class="modern-overlay d-flex align-items-end p-4">
                                        <div class="text-white w-100">
                                            <h5 class="card-title fw-bold mb-1">{{ $label }}</h5>
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="fa-regular fa-images opacity-75"></i>
                                                <small class="opacity-75 tracking-wide">{{ $data['count'] }} Foto</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
</div>

<style>
    .modern-overlay {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 60%;
        background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0) 100%);
        pointer-events: none;
        transition: height 0.3s ease;
    }
    .month-card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        transform: translateY(0);
    }
    .month-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1) !important;
    }
    .month-card:hover .modern-overlay {
        height: 70%;
    }
    .month-card:hover img {
        transform: scale(1.08);
    }
    .card-img-wrapper img {
        transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .object-fit-cover {
        object-fit: cover;
    }
    .tracking-wide {
        letter-spacing: 0.5px;
    }
</style>
@endsection
