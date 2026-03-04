
@php
    use Carbon\Carbon;
@endphp
@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="card card-dark mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Daftar Board Member</h2>
            <a href="{{ route('admin.board_members.create') }}" class="btn btn-primary">Tambah Board Member</a>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card card-dark">
        <div class="card-body p-0">
            <table class="table table-dark table-hover mb-0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Pekerjaan</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Sosmed</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boardMembers as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->position }}</td>
                        <td>{{ $member->birth_date ? Carbon::parse($member->birth_date)->format('d-m-Y') : '-' }}</td>
                        <td>{{ $member->gender == 'L' ? 'Laki-laki' : ($member->gender == 'P' ? 'Perempuan' : '-') }}</td>
                        <td>{{ $member->occupation ?? '-' }}</td>
                        <td>{{ $member->address ?? '-' }}</td>
                        <td>{{ $member->phone ?? '-' }}</td>
                        <td>{{ $member->social_media ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.board_members.edit', $member) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.board_members.destroy', $member) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus board member?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        {{ $boardMembers->links() }}
    </div>
</div>
@endsection
