@extends('layouts.app')

@section('title', 'Beranda - TIBA Surabaya')

@section('content')
    {{-- Hero Section --}}
    <section class="hero">
        <div class="hero-text">
            <h1 class="mb-3">Membangun Jembatan Komunikasi</h1>
            <p>
                TIBA (Tim Bisindo dan Aksesibilitas Surabaya) hadir untuk mengedukasi Bahasa Isyarat Indonesia (BISINDO) dan menciptakan lingkungan inklusif bagi teman tuli.
            </p>
            <a href="#about" class="btn btn-primary">Pelajari Lebih Lanjut</a>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="about-section section-padding">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Tentang Komunitas <span>TIBA</span></h2>
                <p class="section-subtitle">Mengenal lebih dekat siapa kami, apa visi kami, dan bagaimana kami bergerak.</p>
            </div>

            <div class="tab-buttons d-flex justify-content-center">
                <ul class="nav nav-pills" id="aboutTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="sejarah-tab" data-bs-toggle="pill" data-bs-target="#sejarah" type="button" role="tab">Sejarah</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="visi-misi-tab" data-bs-toggle="pill" data-bs-target="#visi-misi" type="button" role="tab">Visi & Misi</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="aboutTabContent">
                <div class="tab-pane fade show active" id="sejarah" role="tabpanel">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-6 about-image">
                            <img src="{{ asset('foto/Frame 54.png') }}" alt="Logo TIBA" class="img-fluid">
                        </div>
                        <div class="col-lg-6 col-md-12 about-text">
                            <h3>Dari Ide Menjadi Gerakan Inklusif</h3>
                            <p>
                                Berdiri sejak 4 November 2016, TIBA merupakan komunitas yang aktif berkolaborasi bersama teman-teman tuli di Surabaya. Kami hadir sebagai wadah untuk meningkatkan kesadaran masyarakat akan pentingnya BISINDO sebagai alat komunikasi.
                                <br><br>
                                Kami juga bekerja sama dengan berbagai instansi untuk menciptakan lingkungan yang ramah dan mudah diakses oleh penyandang disabilitas.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="visi-misi" role="tabpanel">
                    <div class="row g-4 justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="visi-misi-card">
                                <h4><i class="fas fa-eye"></i>Visi Kami</h4>
                                <p>Mewujudkan masyarakat yang sadar akan pentingnya bahasa isyarat agar dapat berkomunikasi dengan teman tuli tanpa batasan.</p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="visi-misi-card">
                                <h4><i class="fas fa-rocket"></i>Misi Kami</h4>
                                <p>Berkolaborasi dengan pemerintah dan instansi untuk mewujudkan kota inklusif, serta mendorong masyarakat untuk aktif belajar bahasa isyarat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Video Section --}}
    <section id="video-profile" class="video-section section-padding">
        <div class="container text-center">
            <h2 class="section-title">Profil Video <span>Komunitas</span></h2>
            <p class="section-subtitle">Kenali kami lebih dekat melalui video singkat tentang semangat dan kegiatan TIBA Surabaya.</p>

            <div class="video-wrapper">
                <iframe
                    src="https://www.youtube.com/embed/qBtYl9oxbKw"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    {{-- Kegiatan Section --}}
    <section id="kegiatan" class="section-padding">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Kegiatan <span>Komunitas</span></h2>
                <p class="section-subtitle">Ikuti berbagai acara kami untuk belajar, berbagi, dan menjadi bagian dari gerakan inklusif.</p>
            </div>
            <div class="row g-4">
                @forelse($latestEvents as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="kegiatan-card">
                            <div class="kegiatan-image-placeholder">
                                @if($event->image_path)
                                    <img src="{{ Storage::url($event->image_path) }}" alt="{{ $event->title }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                @endif
                            </div>
                            <div class="card-body p-0 pt-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h5 class="card-title">{{ $event->title }}</h5>
                                    <span class="badge-custom badge-{{ $event->category }}">
                                        {{ ucfirst($event->category) }}
                                    </span>
                                </div>
                                <div class="kegiatan-info">
                                    <span><i class="far fa-clock"></i> {{ $event->start_time->format('H:i') }} - {{ $event->end_time->format('H:i') }} WIB</span>
                                    <span><i class="fas fa-map-marker-alt"></i> {{ Str::limit($event->location, 30) }}</span>
                                </div>
                                <p class="card-meta"><i class="far fa-calendar-alt"></i> {{ $event->event_date->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada kegiatan yang tersedia.</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('events.index') }}" class="btn btn-primary">Lihat Semua Kegiatan</a>
            </div>
        </div>
    </section>

    {{-- Artikel Section --}}
    <section id="articles" class="artikel-section section-padding">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Artikel & <span>Wawasan</span> Terbaru</h2>
                <p class="section-subtitle">Temukan informasi dan cerita inspiratif seputar dunia bahasa isyarat dan aksesibilitas.</p>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($latestArticles as $article)
                    <div class="col-lg-4 col-md-6">
                        <div class="artikel-card">
                            @if($article->image_path)
                                <img src="{{ Storage::url($article->image_path) }}" alt="{{ $article->title }}">
                            @else
                                <img src="{{ asset('foto/placeholder.jpg') }}" alt="{{ $article->title }}">
                            @endif
                            <div class="card-body">
                                <span class="card-category">Artikel</span>
                                <h5 class="card-title">{{ Str::limit($article->title, 60) }}</h5>
                                <p class="card-text">{{ Str::limit($article->excerpt, 100) }}</p>
                                <p class="card-meta">
                                    <i class="far fa-calendar-alt"></i> {{ $article->created_at->format('d M Y') }}
                                </p>
                                <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada artikel yang tersedia.</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('articles.index') }}" class="btn btn-primary">Lihat Semua Artikel</a>
            </div>
        </div>
    </section>
@endsection
