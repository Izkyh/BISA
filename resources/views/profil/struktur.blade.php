@extends('layouts.app')

@section('title', 'Struktur Organisasi - TIBA Surabaya')

@section('content')
    <div class="container main-content">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Struktur Organisasi</h2>
                <p class="section-subtitle">Kenali tim hebat di balik Komunitas TIBA Surabaya.</p>

                <div class="team-section">
                    @if($founder)
                        <div class="team-header">
                            <h4>Tim TIBA Surabaya</h4>
                            <p>Founder</p>
                        </div>

                        <div class="founder-card">
                            <img src="{{ $founder->photo_url }}" alt="{{ $founder->name }}">
                            <h5>{{ $founder->name }}</h5>
                            <span>{{ $founder->position }}</span>
                        </div>

                        <hr class="my-5">
                    @endif

                    <div class="team-header">
                        <p>Anggota Tim</p>
                    </div>

                    @if($teamMembers->count() > 0)
                        <div class="team-grid">
                            @foreach($teamMembers as $member)
                                <div class="team-member-card">
                                    <img src="{{ $member->photo_url }}" alt="{{ $member->name }}">
                                    <h6>{{ $member->name }}</h6>
                                    <small>{{ $member->position }}</small>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info text-center mt-4">
                            <i class="fas fa-users fa-3x mb-3"></i>
                            <p class="mb-0">Belum ada data anggota tim.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
