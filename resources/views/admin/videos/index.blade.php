@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="card card-dark mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Daftar Video</h2>
            <a href="{{ route('admin.videos.create') }}" class="btn btn-primary">Tambah Video</a>
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
                        <th>Judul</th>
                        <th>URL</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videos as $video)
                    <tr>
                        <td>{{ $video->title }}</td>
                        <td><a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a></td>
                        <td>
                            <a href="{{ route('admin.videos.edit', $video) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.videos.destroy', $video) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus video?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col d-flex justify-content-between">
            @if($videos->onFirstPage())
                <span></span>
            @else
                <a href="{{ $videos->previousPageUrl() }}" class="btn btn-secondary btn-lg px-4"><i class="bi bi-arrow-left"></i> Previous</a>
            @endif
            @if($videos->hasMorePages())
                <a href="{{ $videos->nextPageUrl() }}" class="btn btn-secondary btn-lg px-4">Next <i class="bi bi-arrow-right"></i></a>
            @else
                <span></span>
            @endif
        </div>
    </div>
</div>
@endsection
