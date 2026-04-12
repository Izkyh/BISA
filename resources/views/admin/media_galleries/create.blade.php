@extends('admin.layouts.app')
@section('title', 'Upload Foto Galeri')

@section('content')
<div class="ph">
    <div>
        <h4>Upload Foto Galeri</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.media-galleries.index') }}">Media Gallery</a></li>
            <li class="breadcrumb-item active">Upload</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.media-galleries.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card-admin" style="max-width:640px;">
    <div style="padding:28px;">
        <form action="{{ route('admin.media-galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Tahun & Bulan --}}
            <div class="row g-3 mb-4">
                <div class="col-6">
                    <label class="form-label">Tahun <span style="color:var(--danger);">*</span></label>
                    <select name="year" class="form-select @error('year') is-invalid @enderror" required>
                        @for($y = date('Y') + 1; $y >= 2020; $y--)
                            <option value="{{ $y }}" {{ $y == $defaultYear ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                    @error('year')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-6">
                    <label class="form-label">Bulan <span style="color:var(--danger);">*</span></label>
                    <select name="month" class="form-select @error('month') is-invalid @enderror" required>
                        @foreach($monthMap as $num => $label)
                            <option value="{{ $num }}" {{ $num == $defaultMonth ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('month')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            {{-- Upload gambar (multi) --}}
            <div class="mb-4">
                <label class="form-label">Pilih Foto <span style="color:var(--danger);">*</span></label>
                <input type="file" name="images[]" id="images"
                       class="form-control @if($errors->has('images') || $errors->has('images.*')) is-invalid @endif"
                       accept="image/*" multiple required onchange="previewImages(this)">
                @error('images')<div class="invalid-feedback">{{ $message }}</div>@enderror
                @if(!$errors->has('images'))
                    @error('images.*')<div class="invalid-feedback">{{ $message }}</div>@enderror
                @endif
                <small style="color:var(--muted);">Bisa pilih banyak foto sekaligus. Maks 5 MB per foto.</small>
            </div>

            {{-- Preview grid --}}
            <div id="preview-grid" style="display:grid; grid-template-columns:repeat(auto-fill,minmax(90px,1fr)); gap:8px; margin-bottom:16px;"></div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-lg"></i> Upload
                </button>
                <a href="{{ route('admin.media-galleries.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewImages(input) {
    const grid = document.getElementById('preview-grid');
    grid.innerHTML = '';
    if (!input.files.length) return;
    Array.from(input.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = e => {
            const div = document.createElement('div');
            div.style.cssText = 'position:relative; aspect-ratio:1/1; border-radius:8px; overflow:hidden; border:1px solid var(--border);';
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.cssText = 'width:100%; height:100%; object-fit:cover;';
            div.appendChild(img);
            grid.appendChild(div);
        };
        reader.readAsDataURL(file);
    });
}
</script>
@endpush
@endsection
