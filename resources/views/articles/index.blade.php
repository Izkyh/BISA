@extends('layouts.media')

@section('title', 'Artikel - TIBA Surabaya')

@section('content')
<div class="artikel-section">

    {{-- Header --}}
    <h2 class="section-title with-border">Artikel <span>Terbaru</span></h2>
    <p class="section-description">Baca artikel terbaru seputar BISINDO, aksesibilitas, dan kegiatan komunitas TIBA Surabaya.</p>

    {{-- Filter Kategori --}}
    <div class="filter-tabs">
        <a href="{{ route('articles.index') }}"
           class="filter-btn {{ !request('kategori') ? 'active' : '' }}">
            Semua
        </a>
        <a href="{{ route('articles.index', ['kategori' => 'edukasi']) }}"
           class="filter-btn {{ request('kategori') == 'edukasi' ? 'active' : '' }}">
            Edukasi
        </a>
        <a href="{{ route('articles.index', ['kategori' => 'kegiatan']) }}"
           class="filter-btn {{ request('kategori') == 'kegiatan' ? 'active' : '' }}">
            Kegiatan
        </a>
        <a href="{{ route('articles.index', ['kategori' => 'informasi']) }}"
           class="filter-btn {{ request('kategori') == 'informasi' ? 'active' : '' }}">
            Informasi
        </a>
    </div>

    {{-- Grid Artikel --}}
    @if($articles->count() > 0)
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($articles as $article)
            <div class="col">
                <a href="{{ route('articles.show', $article->slug) }}" class="news-card-link">
                    <div class="news-card">
                        <div class="news-card-img">
                            <img
                                src="{{ $article->image_path ? Storage::url($article->image_path) : asset('foto/placeholder.jpg') }}"
                                alt="{{ $article->title }}"
                                loading="lazy"
                                onerror="this.src='{{ asset('foto/placeholder.jpg') }}'">
                            @if($article->category)
                                <span class="news-badge">{{ $article->category }}</span>
                            @endif
                        </div>
                        <div class="news-card-body">
                            <h3 class="news-title">{{ $article->title }}</h3>
                            <p class="news-excerpt">
                                {{ Str::limit($article->excerpt ?? strip_tags($article->content ?? ''), 130) }}
                            </p>
                            <div class="news-meta">
                                <span>
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ $article->created_at->format('d M Y') }}
                                </span>
                                <span class="news-read-more">
                                    Baca <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($articles->hasPages())
            <nav class="mt-4">
                {{ $articles->links('vendor.pagination.article') }}
            </nav>
        @endif

    @else
        <div class="empty-state">
            <i class="fa-solid fa-newspaper"></i>
            <p>Belum ada artikel yang tersedia.</p>
        </div>
    @endif

</div>
@endsection
