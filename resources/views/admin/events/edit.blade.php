@extends('admin.layouts.app')
@section('title', 'Edit Event')

@section('content')
<div class="ph">
    <div>
        <h4>Edit Event</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Event</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card-admin" style="max-width:720px;">
    <div style="padding:24px;">
        <form action="{{ route('admin.events.update', $event) }}" method="POST"
              enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Judul Event <span style="color:var(--danger);">*</span></label>
                    <input type="text" name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title', $event->title) }}" required>
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Kategori <span style="color:var(--danger);">*</span></label>
                    <select name="category" class="form-select" required>
                        <option value="umum"    {{ old('category', $event->category) == 'umum'    ? 'selected' : '' }}>Umum</option>
                        <option value="kelas"   {{ old('category', $event->category) == 'kelas'   ? 'selected' : '' }}>Kelas</option>
                        <option value="seminar" {{ old('category', $event->category) == 'seminar' ? 'selected' : '' }}>Seminar</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Event <span style="color:var(--danger);">*</span></label>
                    <input type="date" name="event_date" class="form-control"
                           value="{{ old('event_date', $event->event_date?->format('Y-m-d')) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Waktu Mulai <span style="color:var(--danger);">*</span></label>
                    <input type="datetime-local" name="start_time" class="form-control"
                           value="{{ old('start_time', $event->start_time?->format('Y-m-d\TH:i')) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Waktu Selesai <span style="color:var(--danger);">*</span></label>
                    <input type="datetime-local" name="end_time" class="form-control"
                           value="{{ old('end_time', $event->end_time?->format('Y-m-d\TH:i')) }}" required>
                </div>

                <div class="col-12">
                    <label class="form-label">Lokasi <span style="color:var(--danger);">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                        <input type="text" name="location" class="form-control"
                               value="{{ old('location', $event->location) }}" required>
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label">Link Pendaftaran <small style="color:var(--muted);">(opsional)</small></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                        <input type="url" name="link" class="form-control"
                               value="{{ old('link', $event->link) }}">
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label">Gambar Event</label>
                    @if($event->image_path)
                    <div class="mb-2">
                        <img src="{{ asset('images/' . $event->image_path) }}"
                             style="height:80px; border-radius:8px; border:1px solid var(--border);">
                        <small style="color:var(--muted); display:block; margin-top:4px;">Gambar saat ini</small>
                    </div>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <small style="color:var(--muted);">Biarkan kosong jika tidak ingin mengubah gambar</small>
                </div>
            </div>

            <hr class="section-divider">
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i> Update
                </button>
                <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
