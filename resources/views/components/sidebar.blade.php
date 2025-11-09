<div class="sidebar">
    {{-- Artikel Terbaru --}}
    <div class="sidebar-section" id="sidebarArtikel">
        <div class="sidebar-box">
            <h6>Artikel Terbaru</h6>
            {{-- Search Bar --}}
            <div class="sidebar-search">
                <div class="input-group">
                    <input type="text" id="sidebarSearchInput" class="form-control" placeholder="Cari di sidebar...">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <ul class="sidebar-list" id="artikelList">
                @forelse($popularArticles ?? [] as $index => $article)
                    <li class="sidebar-item" data-title="{{ strtolower($article->title) }}">
                        <div class="sidebar-number">{{ $index + 1 }}</div>
                        <div>
                            <a href="{{ route('articles.show', $article->slug) }}" class="text-decoration-none text-dark">
                                <strong>{{ Str::limit($article->title, 50) }}</strong>
                            </a>
                            <small>
                                <i class="fa-regular fa-calendar"></i>
                                {{ $article->created_at->format('d M Y') }}
                            </small>
                        </div>
                    </li>
                @empty
                    <li class="sidebar-item">
                        <div class="text-muted">Belum ada artikel terbaru</div>
                    </li>
                @endforelse
            </ul>
            <a href="{{ route('articles.index') }}" class="view-all-btn">Lihat Semua Artikel</a>
        </div>
    </div>

    {{-- Kegiatan Mendatang --}}
    <div class="sidebar-section mt-4" id="sidebarKegiatan">
        <div class="sidebar-box">
            <h6>Kegiatan Mendatang</h6>
            <ul class="sidebar-list" id="kegiatanList">
                @forelse($upcomingEvents ?? [] as $index => $event)
                    <li class="sidebar-item" data-title="{{ strtolower($event->title) }}">
                        <div class="sidebar-number">{{ $index + 1 }}</div>
                        <div>
                            <a href="{{ route('events.index') }}" class="text-decoration-none text-dark">
                                <strong>{{ Str::limit($event->title, 50) }}</strong>
                            </a>
                            <small>
                                <i class="fa-regular fa-calendar"></i>
                                {{ $event->event_date->format('d M Y') }}
                            </small>
                        </div>
                    </li>
                @empty
                    <li class="sidebar-item">
                        <div class="text-muted">Belum ada kegiatan mendatang</div>
                    </li>
                @endforelse
            </ul>
            <a href="{{ route('events.index') }}" class="view-all-btn">Lihat Semua Kegiatan</a>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('sidebarSearchInput');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase().trim();

            // Search dalam Artikel Terbaru
            const artikelItems = document.querySelectorAll('#artikelList .sidebar-item');
            let artikelVisibleCount = 0;

            artikelItems.forEach(function(item) {
                const title = item.getAttribute('data-title');
                // Skip items without title (empty state)
                if (!title) {
                    item.style.display = '';
                    return;
                }

                if (searchTerm === '' || title.includes(searchTerm)) {
                    item.style.display = 'flex';
                    artikelVisibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Search dalam Kegiatan Mendatang
            const kegiatanItems = document.querySelectorAll('#kegiatanList .sidebar-item');
            let kegiatanVisibleCount = 0;

            kegiatanItems.forEach(function(item) {
                const title = item.getAttribute('data-title');
                // Skip items without title (empty state)
                if (!title) {
                    item.style.display = '';
                    return;
                }

                if (searchTerm === '' || title.includes(searchTerm)) {
                    item.style.display = 'flex';
                    kegiatanVisibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // PENTING: Jangan hide sidebar sections, hanya hide items
            // Sidebar sections tetap visible
            const sidebarArtikel = document.getElementById('sidebarArtikel');
            const sidebarKegiatan = document.getElementById('sidebarKegiatan');

            // Always keep sections visible
            if (sidebarArtikel) {
                sidebarArtikel.style.display = '';
            }
            if (sidebarKegiatan) {
                sidebarKegiatan.style.display = '';
            }

            // Optional: Show "Tidak ada hasil" message
            if (searchTerm) {
                // Check if artikel section has visible items
                if (artikelVisibleCount === 0 && artikelItems.length > 0) {
                    const noResultArtikel = document.querySelector('#artikelList .no-result-message');
                    if (!noResultArtikel) {
                        const message = document.createElement('li');
                        message.className = 'sidebar-item no-result-message';
                        message.innerHTML = '<div class="text-muted">Tidak ada artikel yang ditemukan</div>';
                        document.getElementById('artikelList').appendChild(message);
                    }
                } else {
                    const noResultArtikel = document.querySelector('#artikelList .no-result-message');
                    if (noResultArtikel) {
                        noResultArtikel.remove();
                    }
                }

                // Check if kegiatan section has visible items
                if (kegiatanVisibleCount === 0 && kegiatanItems.length > 0) {
                    const noResultKegiatan = document.querySelector('#kegiatanList .no-result-message');
                    if (!noResultKegiatan) {
                        const message = document.createElement('li');
                        message.className = 'sidebar-item no-result-message';
                        message.innerHTML = '<div class="text-muted">Tidak ada kegiatan yang ditemukan</div>';
                        document.getElementById('kegiatanList').appendChild(message);
                    }
                } else {
                    const noResultKegiatan = document.querySelector('#kegiatanList .no-result-message');
                    if (noResultKegiatan) {
                        noResultKegiatan.remove();
                    }
                }
            } else {
                // Clear "no result" messages when search is cleared
                document.querySelectorAll('.no-result-message').forEach(msg => msg.remove());
            }
        });
    }
});
</script>
@endpush
