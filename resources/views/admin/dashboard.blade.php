@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 py-5 px-4">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="fw-bold">Dashboard Admin</h2>
                    <p class="text-light">Selamat datang di dashboard admin. Silakan pilih menu di samping untuk mengelola data.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card card-dark">
                        <div class="card-body text-center">
                            <i class="bi bi-file-earmark-text display-4 text-primary"></i>
                            <h5 class="mt-3">Artikel</h5>
                            <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-primary btn-sm mt-2">Kelola</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-dark">
                        <div class="card-body text-center">
                            <i class="bi bi-calendar-event display-4 text-success"></i>
                            <h5 class="mt-3">Event</h5>
                            <a href="{{ route('admin.events.index') }}" class="btn btn-outline-success btn-sm mt-2">Kelola</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-dark">
                        <div class="card-body text-center">
                            <i class="bi bi-camera-video display-4 text-danger"></i>
                            <h5 class="mt-3">Video</h5>
                            <a href="{{ route('admin.videos.index') }}" class="btn btn-outline-danger btn-sm mt-2">Kelola</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-dark">
                        <div class="card-body text-center">
                            <i class="bi bi-people display-4 text-warning"></i>
                            <h5 class="mt-3">Board Member</h5>
                            <a href="{{ route('admin.board_members.index') }}" class="btn btn-outline-warning btn-sm mt-2">Kelola</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tombol Previous/Next dihapus dari dashboard, akan dipindahkan ke halaman index masing-masing -->
        </div>
    </div>
</div>
@endsection
