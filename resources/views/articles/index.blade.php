@extends('layouts.media')

@section('title', 'Artikel - TIBA Surabaya')

@section('content')
<div class="artikel-section">
    <div class="container">
        <h2 class="section-title">Artikel Terbaru</h2>

        @forelse($articles as $article)
            <div class="artikel-card">
                @if ($article->image_path)
                    <img src="{{ Storage::url($article->image_path) }}" alt="{{ $article->title }}">
                @else
                    <img src="{{ asset('foto/placeholder.jpg') }}" alt="{{ $article->title }}">
                @endif

                <div class="artikel-content">
                    <h5>{{ $article->title }}</h5>
                    <small>
                        <i class="fa-regular fa-calendar"></i>
                        {{ $article->created_at->format('d F Y') }}
                    </small>
                    <p>{{ Str::limit($article->excerpt ?? strip_tags($article->content), 180) }}</p>
                    <a href="{{ route('articles.show', $article->slug) }}">
                        Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                <i class="fa-solid fa-info-circle"></i> Belum ada artikel yang tersedia.
            </div>
        @endforelse

        {{-- Pagination --}}
        @if($articles->hasPages())
            <nav class="mt-4">
                {{ $articles->links('vendor.pagination.article') }}
            </nav>
        @endif
    </div>
</div>
@endsection
