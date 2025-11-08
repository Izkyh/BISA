@extends('layouts.app')

@section('title', 'Struktur Organisasi - TIBA Surabaya')
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
