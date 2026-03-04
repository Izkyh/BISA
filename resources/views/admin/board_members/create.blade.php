@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-lg rounded-4 border-0 mx-auto" style="max-width:700px;">
        <div class="card-body p-4">
            <h2 class="mb-4 fw-bold text-primary"><i class="bi bi-person-plus me-2"></i>Tambah Board Member</h2>
            <form action="{{ route('admin.board_members.store') }}" method="POST" autocomplete="off">
                enctype="multipart/form-data"
                @csrf
                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold fs-5">Nama <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="name" id="name" class="form-control form-control-lg" value="{{ old('name') }}" required>
                    </div>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="position" class="form-label fw-semibold fs-5">Jabatan <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                        <input type="text" name="position" id="position" class="form-control form-control-lg" value="{{ old('position') }}" required>
                    </div>
                    @error('position')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="type" class="form-label fw-semibold fs-5">Tipe</label>
                    <select name="type" id="type" class="form-select form-select-lg">
                        <option value="founder" {{ old('type') == 'founder' ? 'selected' : '' }}>Founder</option>
                        <option value="board" {{ old('type') == 'board' ? 'selected' : '' }}>Kepengurusan</option>
                        <option value="member" {{ old('type') == 'member' ? 'selected' : '' }}>Anggota</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="birth_date" class="form-label fw-semibold fs-5">Tanggal Lahir</label>
                    <input type="date" name="birth_date" id="birth_date" class="form-control form-control-lg" value="{{ old('birth_date') }}">
                </div>
                <div class="mb-4">
                    <label for="gender" class="form-label fw-semibold fs-5">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-select form-select-lg">
                        <option value="">-</option>
                        <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="occupation" class="form-label fw-semibold fs-5">Pekerjaan</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-building"></i></span>
                        <input type="text" name="occupation" id="occupation" class="form-control form-control-lg" value="{{ old('occupation') }}">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="address" class="form-label fw-semibold fs-5">Alamat</label>
                    <textarea name="address" id="address" class="form-control form-control-lg" rows="2">{{ old('address') }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="phone" class="form-label fw-semibold fs-5">No. HP</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                        <input type="text" name="phone" id="phone" class="form-control form-control-lg" value="{{ old('phone') }}">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="social_media" class="form-label fw-semibold fs-5">Sosmed</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                        <input type="text" name="social_media" id="social_media" class="form-control form-control-lg" value="{{ old('social_media') }}">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="photo_path" class="form-label fw-semibold fs-5">Foto (max 10MB)</label>
                    <input type="file" name="photo_path" id="photo_path" class="form-control form-control-lg" accept="image/*">
                </div>
                <div class="mb-4">
                    <label for="order" class="form-label fw-semibold fs-5">Urutan Tampil</label>
                    <input type="number" name="order" id="order" class="form-control form-control-lg" value="{{ old('order', 0) }}">
                </div>
                <div class="mb-4">
                    <label for="is_active" class="form-label fw-semibold fs-5">Aktif?</label>
                    <select name="is_active" id="is_active" class="form-select form-select-lg">
                        <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-success btn-lg px-4"><i class="bi bi-check-circle me-2"></i>Simpan</button>
                    <a href="{{ route('admin.board_members.index') }}" class="btn btn-secondary btn-lg px-4"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
