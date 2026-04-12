@extends('admin.layouts.app')
@section('title', 'Edit Video')

@section('content')
<div class="ph">
    <div>
        <h4>Edit Video</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.videos.index') }}">Video</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card-admin" style="max-width:600px;">
    <div style="padding:24px;">

        {{-- preview thumbnail --}}
        @if($video->youtube_id)
        <div class="mb-4">
            <img src="{{ $video->thumbnail_url }}"
                 style="width:100%; max-width:360px; border-radius:10px; border:1px solid var(--border);">
        </div>
        @endif

        <form action="{{ route('admin.videos.update', $video) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul Video <span style="color:var(--danger);">*</span></label>
                <input type="text" name="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title', $video->title) }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori <span style="color:var(--danger);">*</span></label>
                <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                    @foreach($categories as $value => $label)
                        <option value="{{ $value }}" {{ old('category', $video->category) === $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
                           value="{{ old('youtube_url', $video->youtube_url) }}" required>
                </div>
                @error('youtube_url')<div class="text-danger mt-1" style="font-size:.78rem;">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i> Update
                </button>
                <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
