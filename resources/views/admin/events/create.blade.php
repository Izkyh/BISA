@extends('admin.layouts.app')
@section('title', 'Tambah Event')

@section('content')
<div class="ph">
    <div>
        <h4>Tambah Event</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Event</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card-admin" style="max-width:720px;">
    <div style="padding:24px;">
        <form action="{{ route('admin.events.store') }}" method="POST"
              enctype="multipart/form-data" autocomplete="off">
            @csrf

            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Judul Event <span style="color:var(--danger);">*</span></label>
                    <input type="text" name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}" required placeholder="Nama event...">
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Kategori <span style="color:var(--danger);">*</span></label>
                    <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                        <option value="">— Pilih Kategori —</option>
                        <option value="umum"    {{ old('category') == 'umum'    ? 'selected' : '' }}>Umum</option>
                        <option value="kelas"   {{ old('category') == 'kelas'   ? 'selected' : '' }}>Kelas</option>
                        <option value="seminar" {{ old('category') == 'seminar' ? 'selected' : '' }}>Seminar</option>
                    </select>
                    @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Event <span style="color:var(--danger);">*</span></label>
                    <input type="date" name="event_date"
                           class="form-control @error('event_date') is-invalid @enderror"
                           value="{{ old('event_date') }}" required>
                    @error('event_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Waktu Mulai <span style="color:var(--danger);">*</span></label>
                    <input type="datetime-local" name="start_time"
                           class="form-control @error('start_time') is-invalid @enderror"
                           value="{{ old('start_time') }}" required>
                    @error('start_time')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Waktu Selesai <span style="color:var(--danger);">*</span></label>
                    <input type="datetime-local" name="end_time"
                           class="form-control @error('end_time') is-invalid @enderror"
                           value="{{ old('end_time') }}" required>
                    @error('end_time')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Lokasi <span style="color:var(--danger);">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                        <input type="text" name="location"
                               class="form-control @error('location') is-invalid @enderror"
                               value="{{ old('location') }}" required placeholder="Nama tempat / alamat...">
                    </div>
                    @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Link Pendaftaran <small style="color:var(--muted);">(opsional)</small></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                        <input type="url" name="link" class="form-control @error('link') is-invalid @enderror"
                               value="{{ old('link') }}" placeholder="https://forms.google.com/...">
                    </div>
                    @error('link')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Aktifkan Donasi</label>
                    <select name="is_donation_enabled" class="form-select">
                        <option value="0" {{ old('is_donation_enabled', '0') == '0' ? 'selected' : '' }}>Tidak</option>
                        <option value="1" {{ old('is_donation_enabled') == '1' ? 'selected' : '' }}>Ya</option>
                    </select>
                </div>

                <div class="col-md-8">
                    <label class="form-label">Link Donasi <small style="color:var(--muted);">(opsional)</small></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-heart"></i></span>
                        <input type="url" name="donation_link" class="form-control @error('donation_link') is-invalid @enderror"
                               value="{{ old('donation_link') }}" placeholder="https://...">
                    </div>
                    @error('donation_link')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Gambar Event <small style="color:var(--muted);">(opsional, max 5MB)</small></label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <hr class="section-divider">
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-lg"></i> Simpan
                </button>
                <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
