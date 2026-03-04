@extends('admin.layouts.app')
@section('title', 'Tambah ' . $typeConfig['label'])

@section('content')
<div class="ph">
    <div>
        <h4>Tambah {{ $typeConfig['label'] }}</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.board_members.index', ['type' => $type]) }}">{{ $typeConfig['label'] }}</a>
            </li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.board_members.index', ['type' => $type]) }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card-admin" style="max-width:720px;">
    <div style="padding:24px;">
        {{-- ✅ enctype sebagai atribut form --}}
        <form action="{{ route('admin.board_members.store') }}" method="POST"
              enctype="multipart/form-data" autocomplete="off">
            @csrf
            {{-- ✅ type pre-filled dari URL --}}
            <input type="hidden" name="type" value="{{ old('type', $type) }}">

            {{-- info section --}}
            <div class="mb-4 p-3 d-flex align-items-center gap-3"
                 style="background:var(--accent)10; border:1px solid var(--accent)28; border-radius:10px;">
                <i class="bi {{ $typeConfig['icon'] }} fs-4" style="color:var(--accent);"></i>
                <div>
                    <div style="font-weight:600; color:var(--text);">{{ $typeConfig['label'] }}</div>
                    <small style="color:var(--muted);">
                        @if($type === 'board') Pengurus aktif organisasi TIBA
                        @elseif($type === 'member') Anggota terdaftar TIBA
                        @else Pembina / Pendiri organisasi TIBA
                        @endif
                    </small>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Lengkap <span style="color:var(--danger);">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" required placeholder="Nama lengkap...">
                    </div>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jabatan / Posisi <span style="color:var(--danger);">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                        <input type="text" name="position"
                               class="form-control @error('position') is-invalid @enderror"
                               value="{{ old('position') }}" required
                               placeholder="{{ $type === 'founder' ? 'Ketua Pembina' : ($type === 'board' ? 'Ketua Harian' : 'Anggota') }}">
                    </div>
                    @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="gender" class="form-select">
                        <option value="">— Pilih —</option>
                        <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">No. HP</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                        <input type="text" name="phone" class="form-control"
                               value="{{ old('phone') }}" placeholder="08xxxxxxxxxx">
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Media Sosial</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                        <input type="text" name="social_media" class="form-control"
                               value="{{ old('social_media') }}" placeholder="@username">
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label">Pekerjaan / Profesi</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-building"></i></span>
                        <input type="text" name="occupation" class="form-control"
                               value="{{ old('occupation') }}" placeholder="Pekerjaan / profesi...">
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label">Alamat</label>
                    <textarea name="address" class="form-control" rows="2"
                              placeholder="Alamat lengkap...">{{ old('address') }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Foto <small style="color:var(--muted);">(max 10MB)</small></label>
                    <input type="file" name="photo_path" class="form-control" accept="image/*">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Urutan Tampil</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}" min="0">
                    <small style="color:var(--muted); font-size:.75rem;">0 = paling awal</small>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="is_active" class="form-select">
                        <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
            </div>

            <hr class="section-divider">
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-lg"></i> Simpan
                </button>
                <a href="{{ route('admin.board_members.index', ['type' => $type]) }}"
                   class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
