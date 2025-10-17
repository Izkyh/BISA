@extends('layouts.media')

@section('title', 'Artikel - TIBA Surabaya')

@section('content')
    <h2 class="section-title">Artikel Terbaru</h2>

    @forelse($articles as $article)
        <div class="artikel-card">
            @if($article->image_path)
                <img src="{{ Storage::url($article->image_path) }}" alt="{{ $article->title }}">
            @else
                <img src="{{ asset('foto/placeholder.jpg') }}" alt="{{ $article->title }}">
            @endif
            <div class="artikel-content">
                <h5>{{ $article->title }}</h5>
                <small><i class="fa-regular fa-calendar"></i> {{ $article->created_at->format('d M Y') }}</small>
                <p>{{ Str::limit($article->excerpt, 150) }}</p>
                <a href="{{ route('articles.show', $article->slug) }}">
                    Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            Belum ada artikel yang tersedia.
        </div>
    @endforelse

    {{-- Pagination --}}
    <nav>
        {{ $articles->links('pagination::bootstrap-5') }}
    </nav>
@endsection
