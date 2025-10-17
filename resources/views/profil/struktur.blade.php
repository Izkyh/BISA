@extends('layouts.app')

@section('title', 'Struktur Organisasi - TIBA Surabaya')

@push('styles')
<style>
    body {
        padding-top: 85px;
    }
    .team-section {
        padding: 30px;
        background-color: var(--white-color);
        border-radius: var(--border-radius-md);
        box-shadow: var(--shadow-sm);
    }
    .team-header {
        text-align: center;
        margin-bottom: 50px;
    }
    .team-header h4 {
        font-weight: 600;
        color: var(--dark-color);
    }
    .team-header p {
        color: var(--primary-color);
        font-weight: 600;
        font-size: 1.1rem;
    }
    .founder-card {
        text-align: center;
        margin-bottom: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .founder-card img {
        width: 200px;
        height: 250px;
        border-radius: var(--border-radius-md);
        object-fit: cover;
        margin-bottom: 20px;
        border: 4px solid var(--primary-color);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .founder-card h5 {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 5px;
    }
    .founder-card span {
        color: #555;
        font-weight: 500;
    }
    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 30px;
        text-align: center;
    }
    .team-member-card {
        background-color: var(--light-bg-color);
        padding: 20px;
        border-radius: var(--border-radius-md);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #eee;
    }
    .team-member-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }
    .team-member-card img {
        width: 100%;
        height: 180px;
        border-radius: var(--border-radius-md);
        object-fit: cover;
        margin-bottom: 15px;
        border: 3px solid var(--white-color);
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .team-member-card h6 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--dark-color);
    }
    .team-member-card small {
        color: var(--primary-color);
        font-weight: 600;
    }
    @media (max-width: 768px) {
        .team-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }
    }
</style>
@endpush

@section('content')
    <div class="container main-content">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Struktur Organisasi</h2>
                <p class="section-subtitle">Kenali tim hebat di balik Komunitas TIBA Surabaya.</p>

                <div class="team-section">
                    <div class="team-header">
                        <h4>Tim TIBA Surabaya</h4>
                        <p>Founder</p>
                    </div>

                    <div class="founder-card">
                        <img src="{{ asset('foto/placeholder.jpg') }}" alt="Founder">
                        <h5>I Gede Made Rony Dwipayana</h5>
                        <span>Founder & Pembina</span>
                    </div>

                    <hr class="my-5">

                    <div class="team-header">
                        <p>Anggota Tim</p>
                    </div>

                    <div class="team-grid">
                        <div class="team-member-card">
                            <img src="{{ asset('foto/placeholder.jpg') }}" alt="Anggota">
                            <h6>Pramaswari</h6>
                            <small>Admin Sosmed</small>
                        </div>
                        <div class="team-member-card">
                            <img src="{{ asset('foto/placeholder.jpg') }}" alt="Anggota">
                            <h6>Nama Anggota</h6>
                            <small>Jabatan</small>
                        </div>
                        <div class="team-member-card">
                            <img src="{{ asset('foto/placeholder.jpg') }}" alt="Anggota">
                            <h6>Nama Anggota</h6>
                            <small>Jabatan</small>
                        </div>
                        <div class="team-member-card">
                            <img src="{{ asset('foto/placeholder.jpg') }}" alt="Anggota">
                            <h6>Nama Anggota</h6>
                            <small>Jabatan</small>
                        </div>
                        <div class="team-member-card">
                            <img src="{{ asset('foto/placeholder.jpg') }}" alt="Anggota">
                            <h6>Nama Anggota</h6>
                            <small>Jabatan</small>
                        </div>
                        <div class="team-member-card">
                            <img src="{{ asset('foto/placeholder.jpg') }}" alt="Anggota">
                            <h6>Nama Anggota</h6>
                            <small>Jabatan</small>
                        </div>
                    </div>

                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
