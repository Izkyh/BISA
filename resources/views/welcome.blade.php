@extends('layouts.app')

@section('title', 'Beranda - TIBA Surabaya')

@section('content')
    {{-- Hero Section --}}
    <section class="hero" id="hero">
        {{-- Slide backgrounds --}}
        <div class="hero-slides">
            <div class="hero-slide active" style="background-image: url('{{ asset('foto/TJN_7780.JPG') }}')"></div>
            <div class="hero-slide" style="background-image: url('{{ asset('foto/TJN_7759.JPG') }}')"></div>

        </div>

        {{-- Overlay --}}
        <div class="hero-overlay"></div>

        {{-- Content --}}
        <div class="hero-text">
            <h1 class="mb-3">Membangun Jembatan Komunikasi</h1>
            <p>
                TIBA (Tim Bisindo dan Aksesibilitas Surabaya) hadir untuk mengedukasi
                Bahasa Isyarat Indonesia (BISINDO) dan menciptakan lingkungan inklusif
                bagi teman tuli.
            </p>
            <a href="#about" class="btn btn-primary">Pelajari Lebih Lanjut</a>
        </div>

        {{-- Dot indicators --}}
        <div class="hero-dots">
            <button class="hero-dot active" data-index="0" aria-label="Slide 1"></button>
            <button class="hero-dot" data-index="1" aria-label="Slide 2"></button>
            <button class="hero-dot" data-index="2" aria-label="Slide 3"></button>
            <button class="hero-dot" data-index="3" aria-label="Slide 4"></button>
        </div>

        {{-- Arrow navigasi --}}
        <button class="hero-arrow hero-arrow-prev" id="heroPrev" aria-label="Previous">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="hero-arrow hero-arrow-next" id="heroNext" aria-label="Next">
            <i class="fas fa-chevron-right"></i>
        </button>
    </section>


    {{-- About Section --}}
    <section id="about" class="about-section section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Tentang Komunitas <span>TIBA</span></h2>
                <p class="section-subtitle">Mengenal lebih dekat siapa kami, apa visi kami, dan bagaimana kami bergerak.</p>
            </div>

            <div class="tab-buttons d-flex justify-content-center mb-4">
                <ul class="nav nav-pills" id="aboutTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="sejarah-tab" data-bs-toggle="pill" data-bs-target="#sejarah"
                            type="button" role="tab">Sejarah</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="visi-misi-tab" data-bs-toggle="pill" data-bs-target="#visi-misi"
                            type="button" role="tab">Visi & Misi</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="aboutTabContent">
                <div class="tab-pane fade show active" id="sejarah" role="tabpanel">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-6 text-center mb-4 mb-lg-0">
                            <img src="{{ asset('foto/Frame 54.png') }}" alt="Logo TIBA" class="img-fluid">
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h3 class="mb-3">Dari Ide Menjadi Gerakan Inklusif</h3>
                            <p class="text-justify">
                                Berdiri sejak 4 November 2016, TIBA merupakan komunitas yang aktif berkolaborasi bersama
                                teman-teman tuli di Surabaya. Kami hadir sebagai wadah untuk meningkatkan kesadaran
                                masyarakat akan pentingnya BISINDO sebagai alat komunikasi.
                            </p>
                            <p class="text-justify">
                                Kami juga bekerja sama dengan berbagai instansi untuk menciptakan lingkungan yang ramah dan
                                mudah diakses oleh penyandang disabilitas.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="visi-misi" role="tabpanel">
                    <div class="row g-4 justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="visi-misi-card">
                                <h4><i class="fas fa-eye"></i> Visi Kami</h4>
                                <p>Mewujudkan masyarakat yang sadar akan pentingnya bahasa isyarat agar dapat berkomunikasi
                                    dengan teman tuli tanpa batasan.</p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="visi-misi-card">
                                <h4><i class="fas fa-rocket"></i> Misi Kami</h4>
                                <p>Berkolaborasi dengan pemerintah dan instansi untuk mewujudkan kota inklusif, serta
                                    mendorong masyarakat untuk aktif belajar bahasa isyarat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Video Section --}}
    <section id="video-profile" class="video-section section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Profil Video <span>Komunitas</span></h2>
                <p class="section-subtitle">Kenali kami lebih dekat melalui video singkat tentang semangat dan kegiatan TIBA
                    Surabaya.</p>
            </div>

            <div class="video-wrapper">
                <iframe src="https://www.youtube.com/embed/qBtYl9oxbKw" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    {{-- Kegiatan Section --}}
    <section id="kegiatan" class="section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Kegiatan <span>Komunitas</span></h2>
                <p class="section-subtitle">Ikuti berbagai acara kami untuk belajar, berbagi, dan menjadi bagian dari
                    gerakan inklusif.</p>
            </div>

            <div class="row g-4">
                @forelse($latestEvents as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="kegiatan-card">
                            <div class="kegiatan-image-placeholder">
                                @if ($event->image_path)
                                    <img src="{{ asset('images/' . $event->image_path) }}" alt="{{ $event->title }}"
                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                @else
                                    <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body p-0 pt-3">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0">{{ $event->title }}</h5>
                                    <span class="badge-custom badge-{{ $event->category }}">
                                        {{ ucfirst($event->category) }}
                                    </span>
                                </div>
                                <div class="kegiatan-info mb-2">
                                    <span><i class="far fa-clock"></i> {{ $event->start_time->format('H:i') }} -
                                        {{ $event->end_time->format('H:i') }} WIB</span>
                                    <span><i class="fas fa-map-marker-alt"></i>
                                        {{ Str::limit($event->location, 30) }}</span>
                                </div>
                                <p class="card-meta mb-0"><i class="far fa-calendar-alt"></i>
                                    {{ $event->event_date->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                            <p class="text-muted mb-0">Belum ada kegiatan yang tersedia saat ini.</p>
                            <small class="text-muted">Pantau terus untuk info kegiatan terbaru!</small>
                        </div>
                    </div>
                @endforelse
            </div>

            @if ($latestEvents->count() > 0)
                <div class="text-center mt-5">
                    <a href="{{ route('events.index') }}" class="btn btn-primary">Lihat Semua Kegiatan</a>
                </div>
            @endif
        </div>
    </section>

    {{-- Artikel Section --}}
    <section id="articles" class="artikel-section section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title mt-2">Artikel & <span>Wawasan</span> Terbaru</h2>
                <p class="section-subtitle">Temukan informasi dan cerita inspiratif seputar dunia bahasa isyarat dan
                    aksesibilitas.</p>
            </div>

            @if ($latestArticles->count() > 0)
                @php
                    $featured = $latestArticles->first();
                    $rest = $latestArticles->skip(1);
                @endphp

                <div class="row g-4 align-items-stretch">

                    {{-- ── Featured Card (kiri, besar) ── --}}
                    <div class="col-lg-7">
                        <a href="{{ route('articles.show', $featured->slug) }}"
                            class="ac ac--featured h-100 d-flex flex-column text-decoration-none">
                            <div class="ac__img-wrap">
                                <img src="{{ $featured->image_path ? asset('images/' . $featured->image_path) : asset('foto/placeholder.jpg') }}"
                                    alt="{{ $featured->title }}">
                                <span class="ac__badge">Artikel</span>
                                <div class="ac__img-overlay"></div>
                            </div>
                            <div class="ac__body flex-fill d-flex flex-column">
                                <h3 class="ac__title">{{ Str::limit($featured->title, 90) }}</h3>
                                <p class="ac__excerpt flex-fill">{{ Str::limit($featured->excerpt, 160) }}</p>
                                <div class="ac__footer">
                                    <span class="ac__date">
                                        <i class="far fa-calendar-alt"></i>
                                        {{ $featured->created_at->format('d M Y') }}
                                    </span>
                                    <span class="ac__cta">Baca Selengkapnya <i class="fas fa-arrow-right"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>

                    {{-- ── Side Cards (kanan, 2 card kecil) ── --}}
                    <div class="col-lg-5 d-flex flex-column gap-4">
                        @forelse ($rest as $article)
                            <a href="{{ route('articles.show', $article->slug) }}"
                                class="ac ac--side flex-fill text-decoration-none">
                                <div class="ac__img-wrap">
                                    <img src="{{ $article->image_path ? asset('images/' . $article->image_path) : asset('foto/placeholder.jpg') }}"
                                        alt="{{ $article->title }}">
                                    <span class="ac__badge">Artikel</span>
                                </div>
                                <div class="ac__body">
                                    <h5 class="ac__title">{{ Str::limit($article->title, 65) }}</h5>
                                    <p class="ac__excerpt">{{ Str::limit($article->excerpt, 90) }}</p>
                                    <div class="ac__footer">
                                        <span class="ac__date">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ $article->created_at->format('d M Y') }}
                                        </span>
                                        <span class="ac__cta">Baca <i class="fas fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </a>
                        @empty
                        @endforelse
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('articles.index') }}" class="btn btn-primary px-4">
                        Lihat Semua Artikel <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                    <p class="text-muted mb-0">Belum ada artikel yang tersedia.</p>
                    <small class="text-muted">Nantikan artikel menarik dari kami!</small>
                </div>
            @endif
        </div>
    </section>

    @push('scripts')
        <script>
            // ── Hero Slideshow ─────────────────────────────────────────────────────
            (function() {
                const slides = document.querySelectorAll('.hero-slide');
                const dots = document.querySelectorAll('.hero-dot');

                if (!slides.length) return;

                let current = 0;
                let timer = null;
                const DELAY = 5000; // 5 detik per slide

                function goTo(index) {
                    // Hapus active dari slide & dot sebelumnya
                    slides[current].classList.remove('active');
                    dots[current]?.classList.remove('active');

                    // Set current baru
                    current = (index + slides.length) % slides.length;

                    slides[current].classList.add('active');
                    dots[current]?.classList.add('active');
                }

                function next() {
                    goTo(current + 1);
                }

                function prev() {
                    goTo(current - 1);
                }

                // Auto-play
                function startTimer() {
                    clearInterval(timer);
                    timer = setInterval(next, DELAY);
                }

                // Arrow buttons
                document.getElementById('heroNext')?.addEventListener('click', () => {
                    next();
                    startTimer();
                });
                document.getElementById('heroPrev')?.addEventListener('click', () => {
                    prev();
                    startTimer();
                });

                // Dot buttons
                dots.forEach(dot => {
                    dot.addEventListener('click', () => {
                        goTo(parseInt(dot.dataset.index));
                        startTimer();
                    });
                });

                // Swipe support (mobile)
                let touchStartX = 0;
                const heroEl = document.getElementById('hero');

                heroEl?.addEventListener('touchstart', e => {
                    touchStartX = e.changedTouches[0].screenX;
                }, {
                    passive: true
                });

                heroEl?.addEventListener('touchend', e => {
                    const diff = touchStartX - e.changedTouches[0].screenX;
                    if (Math.abs(diff) > 50) {
                        diff > 0 ? next() : prev();
                        startTimer();
                    }
                }, {
                    passive: true
                });

                // Pause saat tab tidak aktif (hemat resource)
                document.addEventListener('visibilitychange', () => {
                    document.hidden ? clearInterval(timer) : startTimer();
                });

                // Start
                startTimer();
            })();
        </script>
    @endsection
