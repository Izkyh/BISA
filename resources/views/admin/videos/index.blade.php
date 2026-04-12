@extends('admin.layouts.app')
@section('title', 'Video')

@section('content')
<div class="ph">
    <div>
        <h4>Video YouTube</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Video</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.videos.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Video
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success mb-3"><i class="bi bi-check-circle me-2"></i>{{ session('success') }}</div>
@endif

<div class="card-admin">
    <table class="tbl">
        <thead>
            <tr>
                <th style="width:44px;">#</th>
                <th style="width:90px;">Thumbnail</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>YouTube URL</th>
                <th>Ditambahkan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($videos as $video)
            <tr>
                <td style="color:var(--muted); font-size:.8rem;">
                    {{ ($videos->currentPage()-1)*$videos->perPage()+$loop->iteration }}
                </td>
                <td>
                    @if($video->youtube_id)
                    <img src="{{ $video->thumbnail_url }}"
                         style="width:78px; height:46px; object-fit:cover; border-radius:6px; border:1px solid var(--border);"
                         alt="thumb">
                    @else
                    <div style="width:78px; height:46px; background:var(--bg-hover); border-radius:6px;
                                display:flex; align-items:center; justify-content:center; color:var(--muted);">
                        <i class="bi bi-youtube"></i>
                    </div>
                    @endif
                </td>
                <td style="font-weight:500;">{{ Str::limit($video->title, 44) }}</td>
                <td>
                    <span class="badge" style="background:#4f8cff1a; color:#4f8cff;">
                        {{ \App\Models\Video::getCategories()[$video->category] ?? '-' }}
                    </span>
                </td>
                <td>
                    {{-- ✅ fix: youtube_url --}}
                    <a href="{{ $video->youtube_url }}" target="_blank"
                       style="color:var(--accent); font-size:.8rem; text-decoration:none;">
                        {{ Str::limit($video->youtube_url, 42) }}
                        <i class="bi bi-box-arrow-up-right ms-1" style="font-size:.7rem;"></i>
                    </a>
                </td>
                <td style="color:var(--muted); white-space:nowrap; font-size:.82rem;">
                    {{ $video->created_at->format('d M Y') }}
                </td>
                <td class="text-center" style="white-space:nowrap;">
                    <a href="{{ route('admin.videos.edit', $video) }}"
                       class="btn btn-sm btn-warning btn-icon me-1">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('admin.videos.destroy', $video) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger btn-icon"
                            onclick="return confirm('Hapus video ini?')">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center py-5" style="color:var(--muted);">
                <i class="bi bi-camera-video d-block fs-2 mb-2"></i>Belum ada video
            </td></tr>
            @endforelse
        </tbody>
    </table>
    @if($videos->hasPages())
    <div style="padding:14px 16px; border-top:1px solid var(--border); display:flex; justify-content:center;">
        {{ $videos->links() }}
    </div>
    @endif
</div>
@endsection
