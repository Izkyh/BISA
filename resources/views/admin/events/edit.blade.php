@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="card card-dark mx-auto" style="max-width:600px;">
        <div class="card-body">
            <h2 class="mb-4">Edit Event</h2>
            <form action="{{ route('admin.events.update', $event) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $event->title) }}" required>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="umum" {{ old('category', $event->category) == 'umum' ? 'selected' : '' }}>Umum</option>
                        <option value="kelas" {{ old('category', $event->category) == 'kelas' ? 'selected' : '' }}>Kelas</option>
                        <option value="seminar" {{ old('category', $event->category) == 'seminar' ? 'selected' : '' }}>Seminar</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="start_time" class="form-label">Waktu Mulai</label>
                    <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ old('start_time', $event->start_time) }}" required>
                </div>
                <div class="mb-3">
                    <label for="end_time" class="form-label">Waktu Selesai</label>
                    <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ old('end_time', $event->end_time) }}" required>
                </div>
                <div class="mb-3">
                    <label for="event_date" class="form-label">Tanggal Event</label>
                    <input type="date" name="event_date" id="event_date" class="form-control" value="{{ old('event_date', $event->event_date) }}" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Lokasi</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $event->location) }}" required>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link (opsional)</label>
                    <input type="text" name="link" id="link" class="form-control" value="{{ old('link', $event->link) }}">
                </div>
                <div class="mb-3">
                    <label for="image_path" class="form-label">Image Path</label>
                    <input type="text" name="image_path" id="image_path" class="form-control" value="{{ old('image_path', $event->image_path) }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
