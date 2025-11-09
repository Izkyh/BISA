@extends('layouts.app')

@section('title', 'Daftar Kepengurusan - TIBA Surabaya')

@section('content')
    <div class="container main-content">
        <h2 class="section-title">Daftar Kepengurusan</h2>

        <div class="search-bar mb-4">
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
                <input type="text" id="searchInput" class="form-control" placeholder="Cari nama pengurus...">
            </div>
        </div>

        <div id="member-list" class="row g-4">
            @forelse($boardMembers as $member)
                <div class="col-lg-4 col-md-6 member-col" data-name="{{ strtolower($member->name) }}">
                    <div class="member-card">
                        <div class="member-card-header">
                            <img src="{{ $member->photo_url }}" alt="{{ $member->name }}">
                            <div class="info">
                                <h5>{{ $member->name }}</h5>
                                <span class="member-role-badge">{{ $member->position }}</span>
                            </div>
                        </div>
                        <div class="member-card-body">
                            <ul class="details-list">
                                <li>
                                    <span class="label">Tanggal Lahir</span>
                                    <span class="value">
                                        {{ $member->birth_date ? $member->birth_date->format('d M Y') : '-' }}
                                    </span>
                                </li>
                                <li>
                                    <span class="label">Jenis Kelamin</span>
                                    <span class="value">{{ $member->gender ?? '-' }}</span>
                                </li>
                                <li>
                                    <span class="label">Pekerjaan</span>
                                    <span class="value">{{ $member->occupation ?? '-' }}</span>
                                </li>
                                <li>
                                    <span class="label">Alamat</span>
                                    <span class="value">{{ Str::limit($member->address ?? '-', 30) }}</span>
                                </li>
                                <li>
                                    <span class="label">No. HP</span>
                                    <span class="value">{{ $member->phone ?? '-' }}</span>
                                </li>
                                <li>
                                    <span class="label">Sosmed</span>
                                    <span class="value">{{ $member->social_media ?? '-' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <p class="mb-0">Belum ada data kepengurusan.</p>
                    </div>
                </div>
            @endforelse
        </div>
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
                const memberName = col.getAttribute('data-name');
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
