<nav class="navbar navbar-expand-lg fixed-top {{ request()->routeIs('home') ? 'navbar-landing' : 'navbar-page' }}">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('foto/Frame 54.png') }}" alt="Logo TIBA">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('artikel*') || request()->is('video*') || request()->is('kegiatan*') ? 'active' : '' }}"
                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Media
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('articles.index') }}">Artikel</a></li>
                        <li><a class="dropdown-item" href="{{ route('videos.index') }}">Video</a></li>
                        <li><a class="dropdown-item" href="{{ route('events.index') }}">Informasi Kegiatan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('profil*') ? 'active' : '' }}"
                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profil.kepengurusan') }}">Daftar Kepengurusan</a></li>
                        <li><a class="dropdown-item" href="{{ route('profil.keanggotaan') }}">Daftar Keanggotaan</a></li>
                        <li><a class="dropdown-item" href="{{ route('profil.struktur') }}">Struktur Organisasi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
