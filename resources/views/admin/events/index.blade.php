@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="card card-dark mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Daftar Event</h2>
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary">Tambah Event</a>
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
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ Str::limit($event->description, 100) }}</td>
                        <td>{{ $event->date }}</td>
                        <td>
                            <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus event?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        {{ $events->links() }}
    </div>
    <div class="row mt-4">
        <div class="col d-flex justify-content-between">
            @if($events->onFirstPage())
                <span></span>
            @else
                <a href="{{ $events->previousPageUrl() }}" class="btn btn-secondary btn-lg px-4"><i class="bi bi-arrow-left"></i> Previous</a>
            @endif
            @if($events->hasMorePages())
                <a href="{{ $events->nextPageUrl() }}" class="btn btn-secondary btn-lg px-4">Next <i class="bi bi-arrow-right"></i></a>
            @else
                <span></span>
            @endif
        </div>
    </div>
</div>
@endsection
