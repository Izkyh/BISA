@extends('layouts.media')

@section('title', $monthData['label'] . ' ' . $year . ' - Media Gallery - TIBA Surabaya')

@section('content')
<div class="gallery-show-container">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="{{ route('media-gallery.index') }}">Galeri</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $monthData['label'] }} {{ $year }}</li>
                </ol>
            </nav>
            <h1 class="fw-bold mb-0">Galeri {{ $monthData['label'] }} {{ $year }}</h1>
        </div>
        <a href="{{ route('media-gallery.index') }}" class="back-link d-inline-flex align-items-center text-decoration-none text-dark fw-medium py-2 px-4 bg-white rounded-pill shadow-sm border mt-2 mt-md-0">
            <i class="fa-solid fa-arrow-left arrow-icon me-2 transition"></i>Kembali ke Galeri
        </a>
    </div>

    @if($galleries->isEmpty())
        <div class="text-center py-5 bg-white rounded shadow-sm">
            <i class="fa-regular fa-image fa-4x text-muted mb-4 opacity-50"></i>
            <h3>Belum ada koleksi foto</h3>
            <p class="text-muted">Tidak ada foto yang tersedia untuk bulan ini.</p>
        </div>
    @else
        <div class="row g-4" id="gallery-grid">
            @foreach($galleries as $gallery)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item-card overflow-hidden rounded-4 shadow-sm h-100">
                        <div class="ratio ratio-1x1" onclick="openLightbox('{{ $gallery->image_url }}')">
                            <img src="{{ $gallery->image_url }}" alt="Galeri {{ $monthData['label'] }} {{ $year }}" class="object-fit-cover w-100 h-100 transition">
                            <div class="gallery-overlay d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-arrow-up-right-from-square text-white fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $galleries->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

{{-- Lightbox --}}
<div id="gallery-lightbox" class="lightbox" onclick="closeLightbox()">
    <span class="close-btn">&times;</span>
    <img class="lightbox-content" id="lightbox-img">
</div>

<style>
    .back-link {
        transition: all 0.3s ease;
    }
    .back-link:hover {
        background-color: #f8f9fa !important;
        transform: translateY(-2px);
    }
    .back-link:hover .arrow-icon {
        transform: translateX(-4px);
    }
    .gallery-item-card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        cursor: pointer;
    }
    .gallery-item-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1) !important;
    }
    .gallery-item-card:hover img {
        transform: scale(1.08);
    }
    .gallery-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.5);
        backdrop-filter: blur(2px);
        opacity: 0;
        transition: all 0.3s ease;
        z-index: 10;
    }
    .gallery-item-card:hover .gallery-overlay {
        opacity: 1;
    }
    .object-fit-cover {
        object-fit: cover;
    }
    .transition {
        transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    /* Lightbox Styles */
    .lightbox {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0; top: 0; width: 100%; height: 100%;
        background-color: rgba(0,0,0,0.9);
        backdrop-filter: blur(8px);
        opacity: 0;
        transition: opacity 0.3s ease;
        align-items: center;
        justify-content: center;
    }
    .lightbox.show {
        opacity: 1;
    }
    .lightbox-content {
        max-width: 90%;
        max-height: 85vh;
        border-radius: 12px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        transform: scale(0.95);
        transition: transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .lightbox.show .lightbox-content {
        transform: scale(1);
    }
    .close-btn {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        background: rgba(255,255,255,0.2);
        width: 44px;
        height: 44px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        font-weight: 300;
        line-height: 1;
        transition: all 0.3s ease;
        cursor: pointer;
        z-index: 10000;
        backdrop-filter: blur(4px);
    }
    .close-btn:hover {
        background: rgba(255,255,255,0.4);
        transform: rotate(90deg);
    }
</style>

@push('scripts')
<script>
    const lightbox = document.getElementById('gallery-lightbox');
    
    function openLightbox(src) {
        document.getElementById('lightbox-img').src = src;
        lightbox.style.display = "flex";
        
        // Timeout untuk mengaktifkan transisi CSS
        setTimeout(() => {
            lightbox.classList.add('show');
        }, 10);
        document.body.style.overflow = "hidden";
    }

    function closeLightbox() {
        lightbox.classList.remove('show');
        setTimeout(() => {
            lightbox.style.display = "none";
            document.body.style.overflow = "auto";
        }, 300); // Sesuaikan dengan durasi transisi
    }

    // Close on Esc key
    document.addEventListener('keydown', function(e) {
        if (e.key === "Escape") closeLightbox();
    });
</script>
@endpush
@endsection
