@extends('admin.layouts.app')
@section('title', 'Edit Artikel')

@section('content')
<div class="ph">
    <div>
        <h4>Edit Artikel</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.articles.index') }}">Artikel</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card-admin" style="max-width:820px;">
    <div style="padding:24px;">
        <form action="{{ route('admin.articles.update', $article) }}" method="POST"
              enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul <span style="color:var(--danger);">*</span></label>
                <input type="text" name="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title', $article->title) }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Excerpt</label>
                <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $article->excerpt) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Konten / Body <span style="color:var(--danger);">*</span></label>
                {{-- ✅ name="body" sesuai model --}}
                <textarea name="body" class="form-control @error('body') is-invalid @enderror"
                          rows="10" required>{{ old('body', $article->body) }}</textarea>
                @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Gambar Utama</label>
                @if($article->image_path)
                <div class="mb-2">
                    <img src="{{ asset('images/' . $article->image_path) }}"
                         style="height:80px; border-radius:8px; border:1px solid var(--border);" alt="current image">
                    <small style="color:var(--muted); display:block; margin-top:4px;">Gambar saat ini</small>
                </div>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
                <small style="color:var(--muted);">Biarkan kosong jika tidak ingin mengubah gambar</small>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i> Update
                </button>
                <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
