@extends('admin.layouts.app')
@section('title', 'Artikel')

@section('content')
<div class="ph">
    <div>
        <h4>Artikel</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Artikel</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Artikel
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
                <th>Judul</th>
                <th>Excerpt</th>
                <th>Tanggal</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($articles as $article)
            <tr>
                <td style="color:var(--muted);">
                    {{ ($articles->currentPage()-1)*$articles->perPage()+$loop->iteration }}
                </td>
                <td>
                    <div style="font-weight:500;">{{ Str::limit($article->title, 48) }}</div>
                    <small style="color:var(--muted);">{{ $article->slug }}</small>
                </td>
                <td style="color:var(--muted);">{{ Str::limit($article->excerpt ?? $article->body, 70) }}</td>
                <td style="color:var(--muted); white-space:nowrap; font-size:.82rem;">
                    {{ $article->created_at->format('d M Y') }}
                </td>
                <td class="text-center" style="white-space:nowrap;">
                    <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-warning btn-icon me-1">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger btn-icon"
                            onclick="return confirm('Hapus artikel ini?')">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-5" style="color:var(--muted);">
                <i class="bi bi-inbox d-block fs-2 mb-2"></i>Belum ada artikel
            </td></tr>
            @endforelse
        </tbody>
    </table>
    @if($articles->hasPages())
    <div style="padding:14px 16px; border-top:1px solid var(--border); display:flex; justify-content:center;">
        {{ $articles->links() }}
    </div>
    @endif
</div>
@endsection
