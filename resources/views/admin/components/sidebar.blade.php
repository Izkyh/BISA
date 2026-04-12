<aside class="sidebar" id="sidebar">
    <p class="sidebar-label">Utama</p>
    <nav>
        <a href="{{ route('admin.dashboard') }}"
           class="s-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i> Dashboard
        </a>
    </nav>

    <p class="sidebar-label">Konten</p>
    <nav>
        <a href="{{ route('admin.articles.index') }}"
           class="s-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-richtext"></i> Artikel
        </a>
        <a href="{{ route('admin.events.index') }}"
           class="s-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
            <i class="bi bi-calendar2-event"></i> Event
        </a>
        <a href="{{ route('admin.videos.index') }}"
           class="s-link {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">
            <i class="bi bi-play-circle-fill"></i> Video
        </a>
        <a href="{{ route('admin.media-galleries.index') }}"
           class="s-link {{ request()->routeIs('admin.media-galleries.*') ? 'active' : '' }}">
            <i class="bi bi-images"></i> Media Gallery
        </a>
    </nav>

    <p class="sidebar-label">Organisasi</p>
    <nav>
        {{-- ✅ DROPDOWN Board Member --}}
        @php $isBoardActive = request()->routeIs('admin.board_members.*'); @endphp
        <a href="#boardMenu" data-bs-toggle="collapse"
           aria-expanded="{{ $isBoardActive ? 'true' : 'false' }}"
           class="s-link {{ $isBoardActive ? 'active' : '' }}">
            <i class="bi bi-diagram-3-fill"></i>
            <span>Pengurus & Anggota</span>
            <i class="bi bi-chevron-down chev"></i>
        </a>
        <div class="collapse {{ $isBoardActive ? 'show' : '' }}" id="boardMenu">
            <nav class="sub-nav">
                <a href="{{ route('admin.board_members.index', ['type' => 'board']) }}"
                   class="s-link {{ $isBoardActive && request()->get('type','board') === 'board' ? 'active' : '' }}">
                    <i class="bi bi-people"></i> Kepengurusan
                </a>
                <a href="{{ route('admin.board_members.index', ['type' => 'member']) }}"
                   class="s-link {{ $isBoardActive && request()->get('type') === 'member' ? 'active' : '' }}">
                    <i class="bi bi-person-lines-fill"></i> Guru Pengajar
                </a>
                <a href="{{ route('admin.board_members.index', ['type' => 'founder']) }}"
                   class="s-link {{ $isBoardActive && request()->get('type') === 'founder' ? 'active' : '' }}">
                    <i class="bi bi-diagram-3"></i> Struktur Organisasi
                </a>
            </nav>
        </div>

        <a href="{{ route('admin.users.index') }}"
           class="s-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="bi bi-person-circle"></i> Users
        </a>
    </nav>
</aside>
