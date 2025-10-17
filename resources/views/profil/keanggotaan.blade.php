@extends('layouts.app')

@section('title', 'Daftar Keanggotaan - TIBA Surabaya')

@push('styles')
<style>
    body {
        padding-top: 85px;
    }
    .search-bar .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(253, 197, 0, 0.25);
    }
    .member-card {
        background-color: var(--white-color);
        border-radius: var(--border-radius-md);
        box-shadow: var(--shadow-sm);
        padding: 25px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        border: 1px solid #f0f0f0;
    }
    .member-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }
    .member-card-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }
    .member-card-header img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--primary-color);
    }
    .member-role-badge {
        background-color: var(--primary-color);
        color: var(--dark-color);
        font-size: 0.7rem;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 50px;
        display: inline-block;
    }
    .details-list {
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: 0.85rem;
    }
    .details-list li {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    .details-list li:last-child {
        border-bottom: none;
    }
</style>
@endpush

@section('content')
    <div class="container main-content">
        <h2 class="section-title">Daftar Keanggotaan</h2>

        <div class="search-bar mb-4">
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
                <input type="text" id="searchInput" class="form-control" placeholder="Cari nama anggota...">
            </div>
        </div>

        <div id="member-list" class="row g-4">
            {{-- Sample Data - Replace with actual data from database --}}
            <div class="col-lg-4 col-md-6 member-col">
                <div class="member-card">
                    <div class="member-card-header">
                        <img src="{{ asset('foto/placeholder.jpg') }}" alt="Foto Anggota">
                        <div class="info">
                            <h5>Doni Saputra</h5>
                            <span class="member-role-badge">Anggota</span>
                        </div>
                    </div>
                    <div class="member-card-body">
                        <ul class="details-list">
                            <li><span class="label">Tanggal Lahir</span> <span class="value">-</span></li>
                            <li><span class="label">Jenis Kelamin</span> <span class="value">L</span></li>
                            <li><span class="label">Pekerjaan</span> <span class="value">Mahasiswa</span></li>
                            <li><span class="label">Alamat</span> <span class="value">-</span></li>
                            <li><span class="label">No. HP</span> <span class="value">-</span></li>
                            <li><span class="label">Sosmed</span> <span class="value">-</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Add more member cards as needed --}}
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
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const memberCols = document.querySelectorAll('.member-col');

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            memberCols.forEach(function(col) {
                const memberName = col.querySelector('h5').textContent.toLowerCase();
                if (memberName.includes(searchTerm)) {
                    col.style.display = '';
                } else {
                    col.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush
