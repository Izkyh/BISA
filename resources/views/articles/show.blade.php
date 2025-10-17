@extends('layouts.media')

@section('title', $article->title . ' - TIBA Surabaya')

@section('content')
    <div class="article-container">
        <h1>{{ $article->title }}</h1>

        @if($article->image_path)
            <img src="{{ Storage::url($article->image_path) }}" alt="{{ $article->title }}">
        @endif

        <div id="article-content">
            {!! $article->body !!}
        </div>

        {{-- Share Buttons --}}
        <div class="share-buttons">
            <strong class="me-2">Bagikan:</strong>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}"
               class="share-btn twitter" target="_blank" title="Bagikan ke Twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
               class="share-btn facebook" target="_blank" title="Bagikan ke Facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' ' . request()->url()) }}"
               class="share-btn whatsapp" target="_blank" title="Bagikan ke WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a id="copy-link-btn" class="share-btn copy-link" title="Salin Tautan">
                <i class="fas fa-link"></i>
            </a>
            <small id="copy-feedback" class="ms-2"></small>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Copy Link Function
    const copyLinkBtn = document.getElementById('copy-link-btn');
    const copyFeedback = document.getElementById('copy-feedback');

    copyLinkBtn.addEventListener('click', (event) => {
        event.preventDefault();
        navigator.clipboard.writeText(window.location.href).then(() => {
            copyFeedback.textContent = 'Tersalin!';
            setTimeout(() => { copyFeedback.textContent = ''; }, 2000);
        }).catch(err => {
            console.error('Gagal menyalin tautan: ', err);
            copyFeedback.textContent = 'Gagal!';
            setTimeout(() => { copyFeedback.textContent = ''; }, 2000);
        });
    });
</script>
@endpush
