@extends('admin.layouts.app')
@section('title', 'Tambah Video')

@section('content')
<div class="ph">
    <div>
        <h4>Tambah Video</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.videos.index') }}">Video</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card-admin" style="max-width:600px;">
    <div style="padding:24px;">
        <form action="{{ route('admin.videos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Judul Video <span style="color:var(--danger);">*</span></label>
                <input type="text" name="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}" required placeholder="Judul video...">
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label">YouTube URL <span style="color:var(--danger);">*</span></label>
                {{-- ✅ fix: name="youtube_url" --}}
                <div class="input-group">
                    <span class="input-group-text" style="color:#ef4444;">
                        <i class="bi bi-youtube"></i>
                    </span>
                    <input type="url" name="youtube_url"
                           class="form-control @error('youtube_url') is-invalid @enderror"
                           value="{{ old('youtube_url') }}" required
                           placeholder="https://www.youtube.com/watch?v=...">
                </div>
                @error('youtube_url')<div class="text-danger mt-1" style="font-size:.78rem;">{{ $message }}</div>@enderror
                <small style="color:var(--muted); font-size:.75rem;">
                    Format: youtube.com/watch?v=... &nbsp;|&nbsp; youtu.be/...
                </small>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-lg"></i> Simpan
                </button>
                <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
