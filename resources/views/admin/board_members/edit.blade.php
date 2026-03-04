@extends('admin.layouts.app')
@section('title', 'Edit ' . $typeConfig['label'])

@section('content')
<div class="ph">
    <div>
        <h4>Edit {{ $typeConfig['label'] }}</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.board_members.index', ['type' => $type]) }}">{{ $typeConfig['label'] }}</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.board_members.index', ['type' => $type]) }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card-admin" style="max-width:720px;">
    <div style="padding:24px;">
        {{-- ✅ enctype + file upload sekarang berfungsi --}}
        <form action="{{ route('admin.board_members.update', $boardMember) }}" method="POST"
              enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')
            <input type="hidden" name="type" value="{{ old('type', $boardMember->type) }}">

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Lengkap <span style="color:var(--danger);">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $boardMember->name) }}" required>
                    </div>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jabatan / Posisi <span style="color:var(--danger);">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                        <input type="text" name="position"
                               class="form-control @error('position') is-invalid @enderror"
                               value="{{ old('position', $boardMember->position) }}" required>
                    </div>
                    @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="gender" class="form-select">
                        <option value="">— Pilih —</option>
                        <option value="L" {{ old('gender', $boardMember->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('gender', $boardMember->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="birth_date" class="form-control"
                           value="{{ old('birth_date', $boardMember->birth_date?->format('Y-m-d')) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">No. HP</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                        <input type="text" name="phone" class="form-control"
                               value="{{ old('phone', $boardMember->phone) }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Media Sosial</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                        <input type="text" name="social_media" class="form-control"
                               value="{{ old('social_media', $boardMember->social_media) }}">
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label">Pekerjaan / Profesi</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-building"></i></span>
                        <input type="text" name="occupation" class="form-control"
                               value="{{ old('occupation', $boardMember->occupation) }}">
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label">Alamat</label>
                    <textarea name="address" class="form-control" rows="2">{{ old('address', $boardMember->address) }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Foto</label>
                    @if($boardMember->photo_path)
                    <div class="mb-2 d-flex align-items-center gap-2">
                        <img src="{{ $boardMember->photo_url }}"
                             style="width:52px; height:52px; border-radius:50%; object-fit:cover; border:2px solid var(--border);">
                        <small style="color:var(--muted);">Foto saat ini</small>
                    </div>
                    @endif
                    <input type="file" name="photo_path" class="form-control" accept="image/*">
                    <small style="color:var(--muted); font-size:.75rem;">Biarkan kosong jika tidak ingin mengubah foto</small>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Urutan Tampil</label>
                    <input type="number" name="order" class="form-control"
                           value="{{ old('order', $boardMember->order) }}" min="0">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="is_active" class="form-select">
                        <option value="1" {{ old('is_active', $boardMember->is_active ? 1 : 0) == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('is_active', $boardMember->is_active ? 1 : 0) == 0 ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
            </div>

            <hr class="section-divider">
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i> Update
                </button>
                <a href="{{ route('admin.board_members.index', ['type' => $type]) }}"
                   class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
