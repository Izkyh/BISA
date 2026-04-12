@extends('admin.layouts.app')
@section('title', 'Media Gallery')

@section('content')
<div class="ph">
    <div>
        <h4>Media Gallery</h4>
        <nav aria-label="breadcrumb"><ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Media Gallery</li>
        </ol></nav>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success mb-3"><i class="bi bi-check-circle me-2"></i>{{ session('success') }}</div>
@endif

{{-- ── Jika belum ada foto sama sekali ────────────────────────── --}}
@if(empty($grouped))
    <div class="card-admin">
        <div class="text-center py-5" style="color:var(--muted);">
            <i class="bi bi-images d-block fs-1 mb-3" style="opacity:.4;"></i>
            <p class="mb-3">Belum ada foto galeri</p>
            <a href="{{ route('admin.media-galleries.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Upload Foto Pertama
            </a>
        </div>
    </div>
@else
    {{-- ── Loop setiap tahun ────────────────────────────────────── --}}
    @foreach($grouped as $year => $months)
    <div class="card-admin mb-4">

        {{-- Header tahun --}}
        <div style="padding:16px 22px 12px; border-bottom:1px solid var(--border); display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:10px;">
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="background:var(--accent); color:#fff; font-weight:700; font-size:1.05rem; padding:4px 16px; border-radius:20px;">
                    {{ $year }}
                </span>
                @php $totalYear = array_sum(array_column($months, 'count')); @endphp
                <span style="color:var(--muted); font-size:.85rem;">{{ $totalYear }} foto</span>
            </div>
            <a href="{{ route('admin.media-galleries.create', ['year' => $year, 'month' => now()->month]) }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg"></i> Upload Foto {{ $year }}
            </a>
        </div>

        {{-- Grid 12 bulan --}}
        <div style="padding:20px; display:grid; grid-template-columns:repeat(4, 1fr); gap:14px;">
            @for($m = 1; $m <= 12; $m++)
            @php
                $data  = $months[$m] ?? ['count' => 0, 'cover' => null];
                $count = $data['count'];
                $cover = $data['cover'];
                $isActive = ($year == $currentYear && $m == now()->month);
            @endphp
            <a href="{{ route('admin.media-galleries.show', [$year, $m]) }}"
               class="text-decoration-none"
               style="display:block; border-radius:12px; overflow:hidden; border:2px solid {{ $isActive ? 'var(--accent)' : 'var(--border)' }}; transition:transform .18s, box-shadow .18s;"
               onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 6px 20px rgba(0,0,0,.12)'"
               onmouseout="this.style.transform='';this.style.boxShadow=''">

                {{-- Cover image --}}
                <div style="position:relative; aspect-ratio:4/3; background:var(--bg-hover); overflow:hidden;">
                    @if($cover)
                        <img src="{{ $cover }}" alt="{{ $monthMap[$m] }}" loading="lazy"
                             style="width:100%; height:100%; object-fit:cover;">
                    @else
                        <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                            <i class="bi bi-image" style="font-size:2rem; color:var(--muted); opacity:.5;"></i>
                        </div>
                    @endif

                    {{-- Badge jumlah foto --}}
                    @if($count > 0)
                        <span style="position:absolute; top:7px; right:7px; background:rgba(0,0,0,.55); color:#fff; font-size:.72rem; font-weight:600; padding:2px 8px; border-radius:20px; backdrop-filter:blur(4px);">
                            {{ $count }} foto
                        </span>
                    @endif

                    {{-- Badge bulan ini --}}
                    @if($isActive)
                        <span style="position:absolute; top:7px; left:7px; background:var(--accent); color:#fff; font-size:.68rem; font-weight:700; padding:2px 8px; border-radius:20px;">
                            Bulan Ini
                        </span>
                    @endif
                </div>

                {{-- Footer nama bulan --}}
                <div style="padding:8px 10px; background:var(--bg-card); border-top:1px solid var(--border);">
                    <div style="font-weight:600; font-size:.88rem; color:{{ $count > 0 ? 'var(--text)' : 'var(--muted)' }};">
                        {{ $monthMap[$m] }}
                    </div>
                    @if($count === 0)
                        <div style="font-size:.75rem; color:var(--muted);">Belum ada foto</div>
                    @endif
                </div>
            </a>
            @endfor
        </div>
    </div>
    @endforeach
@endif

{{-- Tahun baru (jika tahun berjalan belum ada) --}}
@if(!isset($grouped[$currentYear]))
<div class="card-admin">
    <div style="padding:18px 22px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:10px;">
        <div style="color:var(--muted); font-size:.9rem;">
            <i class="bi bi-calendar-plus me-2"></i>Belum ada galeri untuk tahun <strong>{{ $currentYear }}</strong>
        </div>
        <a href="{{ route('admin.media-galleries.create', ['year' => $currentYear, 'month' => now()->month]) }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i> Upload Foto {{ $currentYear }}
        </a>
    </div>
</div>
@endif

@endsection
