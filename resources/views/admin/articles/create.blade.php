@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <h2>Tambah Artikel</h2>
    <form action="{{ route('admin.articles.store') }}" method="POST" autocomplete="off">
        enctype="multipart/form-data"
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" required>
            @error('slug')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="excerpt" class="form-label">Excerpt</label>
            <textarea name="excerpt" id="excerpt" class="form-control" rows="2">{{ old('excerpt') }}</textarea>
            @error('excerpt')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" id="body" class="form-control" rows="6" required>{{ old('body') }}</textarea>
            @error('body')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image_path" class="form-label">Image Path</label>
            <input type="text" name="image_path" id="image_path" class="form-control" value="{{ old('image_path') }}">
            @error('image_path')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
