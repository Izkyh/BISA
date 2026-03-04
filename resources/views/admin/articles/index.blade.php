@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <h2>Daftar Artikel</h2>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mb-3">Tambah Artikel</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card card-dark">
        <div class="card-body p-0">
            <table class="table table-dark table-hover mb-0">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Konten</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ Str::limit($article->content, 100) }}</td>
                <td>
                    <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus artikel?')">Hapus</button>
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
            @if($articles->onFirstPage())
                <span></span>
            @else
                <a href="{{ $articles->previousPageUrl() }}" class="btn btn-secondary btn-lg px-4"><i class="bi bi-arrow-left"></i> Previous</a>
            @endif
            @if($articles->hasMorePages())
                <a href="{{ $articles->nextPageUrl() }}" class="btn btn-secondary btn-lg px-4">Next <i class="bi bi-arrow-right"></i></a>
            @else
                <span></span>
            @endif
        </div>
    </div>
</div>
@endsection
