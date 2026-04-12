@extends('admin.layouts.app')
@section('title', 'Galeri ' . $monthName . ' ' . $year)

@section('content')
<div class="ph">
    <div>
        <h4>Galeri {{ $monthName }} {{ $year }}</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.media-galleries.index') }}">Media Gallery</a></li>
            <li class="breadcrumb-item active">{{ $monthName }} {{ $year }}</li>
        </ol></nav>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.media-galleries.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <a href="{{ route('admin.media-galleries.create', ['year' => $year, 'month' => $month]) }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Upload Foto
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success mb-3"><i class="bi bi-check-circle me-2"></i>{{ session('success') }}</div>
@endif

{{-- Navigasi bulan ------------------------------------------------ --}}
<div class="card-admin mb-4">
    <div style="padding:14px 18px; border-bottom:1px solid var(--border); font-size:.82rem; color:var(--muted); font-weight:600; letter-spacing:.04em; text-transform:uppercase;">
        Pilih Bulan — {{ $year }}
    </div>
    <div style="display:flex; flex-wrap:wrap; gap:6px; padding:14px 18px;">
        @foreach($monthMap as $num => $label)
            <a href="{{ route('admin.media-galleries.show', [$year, $num]) }}"
               class="btn btn-sm {{ $num == $month ? 'btn-primary' : 'btn-secondary' }}"
               style="{{ $num == $month ? '' : 'opacity:.7;' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>
</div>

{{-- Grid foto ----------------------------------------------------- --}}
<div class="card-admin">
    <div class="row g-3 p-4">
        @forelse($galleries as $gallery)
            <div class="col-md-2 col-sm-4 col-6">
                <div class="border rounded-4 p-2 h-100 position-relative" style="overflow:hidden;">
                    <img src="{{ $gallery->image_url }}"
                         alt="Galeri {{ $gallery->id }}"
                         class="img-fluid rounded-3 w-100 mb-2 lightbox-trigger"
                         data-src="{{ $gallery->image_url }}"
                         style="aspect-ratio:1/1; object-fit:cover; cursor:pointer;">
                    <div class="small text-muted mb-2" style="font-size:.72rem;">{{ $gallery->created_at->format('d M Y') }}</div>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.media-galleries.edit', $gallery) }}" class="btn btn-sm btn-warning w-100">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.media-galleries.destroy', $gallery) }}" method="POST" class="w-100">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger w-100" onclick="return confirm('Hapus foto ini?')">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5" style="color:var(--muted);">
                <i class="bi bi-images d-block fs-1 mb-3" style="opacity:.4;"></i>
                <p>Belum ada foto untuk <strong>{{ $monthName }} {{ $year }}</strong></p>
                <a href="{{ route('admin.media-galleries.create', ['year' => $year, 'month' => $month]) }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Upload Foto Sekarang
                </a>
            </div>
        @endforelse
    </div>

    @if($galleries->hasPages())
        <div style="padding:14px 16px; border-top:1px solid var(--border); display:flex; justify-content:center;">
            {{ $galleries->links() }}
        </div>
    @endif
</div>

{{-- Lightbox simple --}}
<div id="lightbox" onclick="closeLightbox()"
     style="display:none; position:fixed; inset:0; background:rgba(0,0,0,.85); z-index:9999; align-items:center; justify-content:center; cursor:zoom-out;">
    <img id="lightbox-img" src="" alt="Preview" style="max-width:90vw; max-height:90vh; border-radius:10px; box-shadow:0 20px 60px rgba(0,0,0,.6);">
</div>

@push('scripts')
<script>
function openLightbox(src) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
    document.body.style.overflow = '';
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });
document.addEventListener('click', e => {
    if (e.target.classList.contains('lightbox-trigger')) {
        openLightbox(e.target.dataset.src);
    }
});
</script>
@endpush
@endsection
