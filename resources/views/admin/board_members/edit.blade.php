@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="card card-dark mx-auto" style="max-width:600px;">
        <div class="card-body">
            <h2 class="mb-4">Edit Board Member</h2>
            <form action="{{ route('admin.board_members.update', $boardMember) }}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold fs-5">Nama <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="name" id="name" class="form-control form-control-lg" value="{{ old('name', $boardMember->name) }}" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="position" class="form-label fw-semibold fs-5">Jabatan <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                        <input type="text" name="position" id="position" class="form-control form-control-lg" value="{{ old('position', $boardMember->position) }}" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="type" class="form-label fw-semibold fs-5">Tipe</label>
                    <select name="type" id="type" class="form-select form-select-lg">
                        <option value="founder" {{ old('type', $boardMember->type) == 'founder' ? 'selected' : '' }}>Founder</option>
                        <option value="board" {{ old('type', $boardMember->type) == 'board' ? 'selected' : '' }}>Kepengurusan</option>
                        <option value="member" {{ old('type', $boardMember->type) == 'member' ? 'selected' : '' }}>Anggota</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="birth_date" class="form-label fw-semibold fs-5">Tanggal Lahir</label>
                    <input type="date" name="birth_date" id="birth_date" class="form-control form-control-lg" value="{{ old('birth_date', $boardMember->birth_date) }}">
                </div>
                <div class="mb-4">
                    <label for="gender" class="form-label fw-semibold fs-5">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-select form-select-lg">
                        <option value="">-</option>
                        <option value="L" {{ old('gender', $boardMember->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('gender', $boardMember->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="occupation" class="form-label fw-semibold fs-5">Pekerjaan</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-building"></i></span>
                        <input type="text" name="occupation" id="occupation" class="form-control form-control-lg" value="{{ old('occupation', $boardMember->occupation) }}">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="address" class="form-label fw-semibold fs-5">Alamat</label>
                    <textarea name="address" id="address" class="form-control form-control-lg" rows="2">{{ old('address', $boardMember->address) }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="phone" class="form-label fw-semibold fs-5">No. HP</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                        <input type="text" name="phone" id="phone" class="form-control form-control-lg" value="{{ old('phone', $boardMember->phone) }}">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="social_media" class="form-label fw-semibold fs-5">Sosmed</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                        <input type="text" name="social_media" id="social_media" class="form-control form-control-lg" value="{{ old('social_media', $boardMember->social_media) }}">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="photo_path" class="form-label fw-semibold fs-5">Foto (path)</label>
                    <input type="text" name="photo_path" id="photo_path" class="form-control form-control-lg" value="{{ old('photo_path', $boardMember->photo_path) }}">
                </div>
                <div class="mb-4">
                    <label for="order" class="form-label fw-semibold fs-5">Urutan Tampil</label>
                    <input type="number" name="order" id="order" class="form-control form-control-lg" value="{{ old('order', $boardMember->order) }}">
                </div>
                <div class="mb-4">
                    <label for="is_active" class="form-label fw-semibold fs-5">Aktif?</label>
                    <select name="is_active" id="is_active" class="form-select form-select-lg">
                        <option value="1" {{ old('is_active', $boardMember->is_active) == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('is_active', $boardMember->is_active) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-4"><i class="bi bi-check-circle me-2"></i>Update</button>
                    <a href="{{ route('admin.board_members.index') }}" class="btn btn-secondary btn-lg px-4"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
                </div>
        </div>
    </div>
</div>
@endsection
