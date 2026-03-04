@extends('admin.layouts.app')
@section('title', 'Tambah Artikel')

@section('content')
<div class="ph">
    <div>
        <h4>Tambah Artikel</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.articles.index') }}">Artikel</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card-admin" style="max-width:820px;">
    <div style="padding:24px;">
        {{-- ✅ enctype sebagai atribut form --}}
        <form action="{{ route('admin.articles.store') }}" method="POST"
              enctype="multipart/form-data" autocomplete="off">
            @csrf

            <div class="mb-3">
                <label class="form-label">Judul <span style="color:var(--danger);">*</span></label>
                <input type="text" name="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}" placeholder="Judul artikel..." required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Excerpt <small style="color:var(--muted);">(ringkasan singkat)</small></label>
                <textarea name="excerpt" class="form-control" rows="2"
                          placeholder="Ringkasan singkat artikel...">{{ old('excerpt') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Konten / Body <span style="color:var(--danger);">*</span></label>
                {{-- ✅ name="body" sesuai model --}}
                <textarea name="body" class="form-control @error('body') is-invalid @enderror"
                          rows="10" required placeholder="Isi konten artikel...">{{ old('body') }}</textarea>
                @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Gambar Utama <small style="color:var(--muted);">(opsional, max 5MB)</small></label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-lg"></i> Simpan
                </button>
                <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
