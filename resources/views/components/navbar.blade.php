<nav class="navbar navbar-expand-lg fixed-top {{ request()->routeIs('home') ? 'navbar-landing' : 'navbar-page' }}">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}" style="margin-left: -36px;">
            <img src="{{ asset('foto/Frame 54.png') }}" alt="Logo TIBA">
        </a>



        {{-- Hamburger Button --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Nav Links --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                {{-- Beranda --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>

                {{-- Media Dropdown --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('articles.*') || request()->routeIs('videos.*') || request()->routeIs('events.*') || request()->routeIs('media-gallery.*') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Media
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('articles.*') ? 'active' : '' }}"
                                href="{{ route('articles.index') }}">
                                <i class="fa-regular fa-newspaper me-2"></i> Artikel
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('videos.*') ? 'active' : '' }}"
                                href="{{ route('videos.index') }}">
                                <i class="fa-brands fa-youtube me-2"></i> Video
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('events.*') ? 'active' : '' }}"
                                href="{{ route('events.index') }}">
                                <i class="fa-regular fa-calendar me-2"></i> Informasi Kegiatan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('media-gallery.*') ? 'active' : '' }}"
                                href="{{ route('media-gallery.index') }}">
                                <i class="fa-regular fa-image me-2"></i> Media Gallery
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Profil Dropdown --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('profil*') ? 'active' : '' }}" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('profil.kepengurusan') ? 'active' : '' }}"
                                href="{{ route('profil.kepengurusan') }}">
                                <i class="fa-solid fa-users me-2"></i> Daftar Kepengurusan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('profil.keanggotaan') ? 'active' : '' }}"
                                href="{{ route('profil.keanggotaan') }}">
                                <i class="fa-solid fa-id-card me-2"></i> Daftar Guru Pengajar
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('profil.struktur') ? 'active' : '' }}"
                                href="{{ route('profil.struktur') }}">
                                <i class="fa-solid fa-sitemap me-2"></i> Struktur Organisasi
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Kontak --}}
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Kontak</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const navbar = document.querySelector('.navbar');
            const navbarCollapse = document.querySelector('#navbarNav');

            // ── 1. Scroll: tambah class scrolled ──────────────────────────
            window.addEventListener('scroll', function() {
                navbar.classList.toggle('scrolled', window.scrollY > 50);
            });

            // ── 2. Helper: tutup collapse di mobile ───────────────────────
            function closeMobileMenu() {
                if (window.innerWidth < 992 && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse) bsCollapse.hide();
                }
            }

            // ── 3. Tutup saat nav-link biasa diklik (mobile) ──────────────
            document.querySelectorAll('.navbar-nav .nav-link:not(.dropdown-toggle)').forEach(link => {
                link.addEventListener('click', closeMobileMenu);
            });

            // ── 4. Tutup saat dropdown-item diklik (mobile) ───────────────
            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', closeMobileMenu);
            });

            // ── 5. Dropdown hover di desktop ─────────────────────────────
            document.querySelectorAll('.navbar .dropdown').forEach(dropdown => {
                const menu = dropdown.querySelector('.dropdown-menu');
                const toggle = dropdown.querySelector('.dropdown-toggle');

                if (!menu || !toggle) return;

                dropdown.addEventListener('mouseenter', () => {
                    if (window.innerWidth >= 992) {
                        menu.classList.add('show');
                        toggle.setAttribute('aria-expanded', 'true');
                    }
                });

                dropdown.addEventListener('mouseleave', () => {
                    if (window.innerWidth >= 992) {
                        menu.classList.remove('show');
                        toggle.setAttribute('aria-expanded', 'false');
                    }
                });
            });

            // ── 6. Tutup dropdown desktop saat klik di luar ───────────────
            document.addEventListener('click', function(e) {
                if (window.innerWidth >= 992) {
                    document.querySelectorAll('.navbar .dropdown-menu.show').forEach(menu => {
                        if (!menu.closest('.dropdown').contains(e.target)) {
                            menu.classList.remove('show');
                            menu.closest('.dropdown')
                                .querySelector('.dropdown-toggle')
                                ?.setAttribute('aria-expanded', 'false');
                        }
                    });
                }
            });

            // ── 7. Reset dropdown state saat resize window ────────────────
            window.addEventListener('resize', function() {
                document.querySelectorAll('.navbar .dropdown-menu.show').forEach(menu => {
                    if (window.innerWidth >= 992) return;
                    menu.classList.remove('show');
                });
            });

        });
    </script>
@endpush
