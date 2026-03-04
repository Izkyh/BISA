@extends('admin.layouts.app')
@section('title', 'Users')

@section('content')
<div class="ph">
    <div>
        <h4>Users</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah User
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success mb-3"><i class="bi bi-check-circle me-2"></i>{{ session('success') }}</div>
@endif

<div class="card-admin">
    <table class="tbl">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Bergabung</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td style="color:var(--muted); font-size:.8rem;">
                    {{ ($users->currentPage()-1)*$users->perPage()+$loop->iteration }}
                </td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <div style="width:32px; height:32px; border-radius:50%;
                                    background:linear-gradient(135deg,var(--accent),var(--accent-2));
                                    display:flex; align-items:center; justify-content:center;
                                    color:#fff; font-size:.8rem; font-weight:700; flex-shrink:0;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <span style="font-weight:500;">{{ $user->name }}</span>
                    </div>
                </td>
                <td style="color:var(--muted);">{{ $user->email }}</td>
                <td style="color:var(--muted); white-space:nowrap; font-size:.82rem;">
                    {{ $user->created_at->format('d M Y') }}
                </td>
                <td class="text-center" style="white-space:nowrap;">
                    <a href="{{ route('admin.users.edit', $user) }}"
                       class="btn btn-sm btn-warning btn-icon me-1">
                        <i class="bi bi-pencil"></i>
                    </a>
                    @if(auth()->id() !== $user->id)
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger btn-icon"
                            onclick="return confirm('Hapus user {{ addslashes($user->name) }}?')">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </form>
                    @else
                    <span class="badge" style="background:var(--accent)18; color:var(--accent);">Anda</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-5" style="color:var(--muted);">
                <i class="bi bi-people d-block fs-2 mb-2"></i>Belum ada user
            </td></tr>
            @endforelse
        </tbody>
    </table>
    @if($users->hasPages())
    <div style="padding:14px 16px; border-top:1px solid var(--border); display:flex; justify-content:center;">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection
