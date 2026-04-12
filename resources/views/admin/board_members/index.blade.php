@extends('admin.layouts.app')
@section('title', $typeConfig['label'])

@section('content')
<div class="ph">
    <div>
        <h4><i class="bi {{ $typeConfig['icon'] }} me-2" style="color:var(--accent);"></i>{{ $typeConfig['label'] }}</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ $typeConfig['label'] }}</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.board_members.create', ['type' => $type]) }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah
    </a>
</div>

{{-- TAB NAVIGASI --}}
<div class="d-flex gap-2 mb-4 flex-wrap">
    @foreach([
        'board'   => ['label' => 'Kepengurusan',       'icon' => 'bi-people'],
        'member'  => ['label' => 'Guru Pengajar',       'icon' => 'bi-person-lines-fill'],
        'founder' => ['label' => 'Struktur Organisasi', 'icon' => 'bi-diagram-3'],
    ] as $t => $cfg)
    <a href="{{ route('admin.board_members.index', ['type' => $t]) }}"
       class="btn btn-sm {{ $type === $t ? 'btn-primary' : 'btn-secondary' }}">
        <i class="bi {{ $cfg['icon'] }}"></i> {{ $cfg['label'] }}
    </a>
    @endforeach
</div>

@if(session('success'))
    <div class="alert alert-success mb-3"><i class="bi bi-check-circle me-2"></i>{{ session('success') }}</div>
@endif

<div class="card-admin">
    <table class="tbl">
        <thead>
            <tr>
                <th style="width:44px;">#</th>
                <th>Nama</th>
                <th>Jabatan / Posisi</th>
                @if($type !== 'founder')
                <th>No. HP</th>
                @endif
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($boardMembers as $member)
            <tr>
                <td style="color:var(--muted); font-size:.8rem;">
                    {{ ($boardMembers->currentPage()-1)*$boardMembers->perPage()+$loop->iteration }}
                </td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{ $member->photo_url }}"
                             style="width:34px; height:34px; border-radius:50%; object-fit:cover; border:2px solid var(--border); flex-shrink:0;"
                             alt="{{ $member->name }}">
                        <div>
                            <div style="font-weight:500; line-height:1.2;">{{ $member->name }}</div>
                            @if($member->gender)
                            <small style="color:var(--muted);">
                                {{ $member->gender === 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </small>
                            @endif
                        </div>
                    </div>
                </td>
                <td style="color:var(--muted);">{{ $member->position }}</td>
                @if($type !== 'founder')
                <td style="color:var(--muted); font-size:.82rem;">{{ $member->phone ?? '—' }}</td>
                @endif
                <td>
                    @if($member->is_active)
                        <span class="badge" style="background:#22c55e1a; color:#22c55e;">Aktif</span>
                    @else
                        <span class="badge" style="background:#ef44441a; color:#ef4444;">Nonaktif</span>
                    @endif
                </td>
                <td class="text-center" style="white-space:nowrap;">
                    <a href="{{ route('admin.board_members.edit', $member) }}"
                       class="btn btn-sm btn-warning btn-icon me-1">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('admin.board_members.destroy', $member) }}"
                          method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger btn-icon"
                            onclick="return confirm('Hapus {{ addslashes($member->name) }}?')">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center py-5" style="color:var(--muted);">
                <i class="bi bi-inbox d-block fs-2 mb-2"></i>
                Belum ada data {{ $typeConfig['label'] }}
            </td></tr>
            @endforelse
        </tbody>
    </table>
    @if($boardMembers->hasPages())
    <div style="padding:14px 16px; border-top:1px solid var(--border); display:flex; justify-content:center;">
        {{ $boardMembers->appends(['type' => $type])->links() }}
    </div>
    @endif
</div>
@endsection
