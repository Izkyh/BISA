@extends('admin.layouts.app')
@section('title', 'Edit Foto Galeri')

@section('content')
<div class="ph">
    <div>
        <h4>Edit Foto Galeri</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.media-galleries.index') }}">Media Gallery</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.media-galleries.show', [$mediaGallery->year, $mediaGallery->month]) }}">{{ $monthMap[$mediaGallery->month] ?? '-' }} {{ $mediaGallery->year }}</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.media-galleries.show', [$mediaGallery->year, $mediaGallery->month]) }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card-admin" style="max-width:600px;">
    <div style="padding:28px;">

        {{-- Foto saat ini --}}
        <div class="mb-4 text-center">
            <img src="{{ $mediaGallery->image_url }}"
                 alt="Galeri {{ $mediaGallery->id }}"
                 class="img-fluid rounded-3"
                 style="max-height:280px; object-fit:cover; border:1px solid var(--border);">
            <div class="small text-muted mt-2">Foto saat ini</div>
        </div>

        <form action="{{ route('admin.media-galleries.update', $mediaGallery) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Tahun & Bulan --}}
            <div class="row g-3 mb-4">
                <div class="col-6">
                    <label class="form-label">Tahun <span style="color:var(--danger);">*</span></label>
                    <select name="year" class="form-select @error('year') is-invalid @enderror" required>
                        @for($y = date('Y') + 1; $y >= 2020; $y--)
                            <option value="{{ $y }}" {{ $y == $mediaGallery->year ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                    @error('year')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-6">
                    <label class="form-label">Bulan <span style="color:var(--danger);">*</span></label>
                    <select name="month" class="form-select @error('month') is-invalid @enderror" required>
                        @foreach($monthMap as $num => $label)
                            <option value="{{ $num }}" {{ $num == $mediaGallery->month ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('month')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            {{-- Ganti Gambar --}}
            <div class="mb-4">
                <label class="form-label">Ganti Gambar <span style="color:var(--muted); font-weight:400;">(opsional)</span></label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                       accept="image/*" onchange="previewNewImage(this)">
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            {{-- Preview gambar baru --}}
            <div id="new-preview" style="display:none; margin-bottom:16px;">
                <div class="small text-muted mb-1">Preview gambar baru:</div>
                <img id="new-preview-img" src="" alt="Preview" class="img-fluid rounded-3"
                     style="max-height:200px; object-fit:cover; border:1px solid var(--border);">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i> Update
                </button>
                <a href="{{ route('admin.media-galleries.show', [$mediaGallery->year, $mediaGallery->month]) }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewNewImage(input) {
    const preview = document.getElementById('new-preview');
    const img = document.getElementById('new-preview-img');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            img.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
    }
}
</script>
@endpush
@endsection
