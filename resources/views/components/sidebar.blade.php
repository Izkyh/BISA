<div class="sidebar">

    {{-- ── Artikel Terbaru ─────────────────────────────────────── --}}
    <div class="sidebar-section" id="sidebarArtikel">
        <div class="sidebar-box">
            <h6><i class="fas fa-newspaper"></i> Artikel Terbaru</h6>

            {{-- Search Bar --}}
            <div class="sidebar-search">
                <div class="input-group">
                    <input type="text" id="sidebarSearchInput"
                           class="form-control"
                           placeholder="Cari artikel atau kegiatan..."
                           autocomplete="off">
                    <button class="btn" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <div id="searchInfo" class="search-info" style="display:none;">
                    <small>
                        <span id="searchInfoText"></span>
                        <button type="button" id="clearSearch" class="clear-search">
                            <i class="fas fa-times"></i> Reset
                        </button>
                    </small>
                </div>
            </div>

            <ul class="sidebar-list" id="artikelList">
                @forelse($popularArticles ?? [] as $article)
                    <li class="sidebar-item" data-title="{{ strtolower($article->title) }}">

                        {{-- ✅ Thumbnail artikel --}}
                        <div class="sidebar-thumb">
                            @if($article->image_path)
                                <img src="{{ Storage::url($article->image_path) }}"
                                     alt="{{ $article->title }}">
                            @else
                                <div class="sidebar-thumb-placeholder">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                            @endif
                        </div>

                        <div class="sidebar-item-content">
                            <a href="{{ route('articles.show', $article->slug) }}">
                                <strong>{{ Str::limit($article->title, 55) }}</strong>
                            </a>
                            <small>
                                <i class="fa-regular fa-calendar"></i>
                                {{ $article->created_at->format('d M Y') }}
                            </small>
                        </div>
                    </li>
                @empty
                    <li class="sidebar-item sidebar-empty">
                        <i class="fas fa-inbox"></i>
                        <span>Belum ada artikel terbaru.</span>
                    </li>
                @endforelse

                <li class="sidebar-item no-result-message" id="noResultArtikel" style="display:none;">
                    <i class="fas fa-search"></i>
                    <span>Tidak ada artikel yang ditemukan.</span>
                </li>
            </ul>

            <a href="{{ route('articles.index') }}" class="view-all-btn">
                Lihat Semua Artikel
            </a>
        </div>
    </div>

    {{-- ── Kegiatan Mendatang ──────────────────────────────────── --}}
    <div class="sidebar-section" id="sidebarKegiatan">
        <div class="sidebar-box">
            <h6><i class="fas fa-calendar-alt"></i> Kegiatan Mendatang</h6>

            <ul class="sidebar-list" id="kegiatanList">
                @forelse($upcomingEvents ?? [] as $event)
                    <li class="sidebar-item" data-title="{{ strtolower($event->title) }}">

                        {{-- ✅ Thumbnail kegiatan --}}
                        <div class="sidebar-thumb">
                            @if($event->image_path)
                                <img src="{{ Storage::url($event->image_path) }}"
                                     alt="{{ $event->title }}">
                            @else
                                {{-- Placeholder dengan warna per kategori --}}
                                <div class="sidebar-thumb-placeholder cat-{{ $event->category }}">
                                    @if($event->category === 'kelas')
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    @elseif($event->category === 'seminar')
                                        <i class="fas fa-microphone-alt"></i>
                                    @else
                                        <i class="fas fa-users"></i>
                                    @endif
                                </div>
                            @endif

                            {{-- ✅ Badge tanggal di atas thumbnail --}}
                            <div class="sidebar-thumb-date">
                                <span class="day">{{ $event->event_date->format('d') }}</span>
                                <span class="month">{{ $event->event_date->format('M') }}</span>
                            </div>
                        </div>

                        <div class="sidebar-item-content">
                            <a href="{{ route('events.index') }}">
                                <strong>{{ Str::limit($event->title, 55) }}</strong>
                            </a>

                            {{-- Info lokasi + waktu --}}
                            <small>
                                <i class="fas fa-clock"></i>
                                {{ $event->start_time->format('H:i') }} WIB
                            </small>
                            <small>
                                <i class="fas fa-map-marker-alt"></i>
                                {{ Str::limit($event->location, 28) }}
                            </small>

                            {{-- Badge kategori + segera --}}
                            <div class="sidebar-badges">
                                <span class="event-category-badge badge-{{ $event->category }}">
                                    {{ ucfirst($event->category) }}
                                </span>
                                @php $diff = now()->diffInDays($event->event_date, false); @endphp
                                @if($diff >= 0 && $diff <= 7)
                                    <span class="badge-soon">
                                        {{ $diff == 0 ? 'Hari ini!' : $diff . ' hari lagi' }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="sidebar-item sidebar-empty">
                        <i class="fas fa-calendar-times"></i>
                        <span>Belum ada kegiatan mendatang.</span>
                    </li>
                @endforelse

                <li class="sidebar-item no-result-message" id="noResultKegiatan" style="display:none;">
                    <i class="fas fa-search"></i>
                    <span>Tidak ada kegiatan yang ditemukan.</span>
                </li>
            </ul>

            <a href="{{ route('events.index') }}" class="view-all-btn">
                Lihat Semua Kegiatan
            </a>
        </div>
    </div>

</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput   = document.getElementById('sidebarSearchInput');
    const clearBtn      = document.getElementById('clearSearch');
    const searchInfo    = document.getElementById('searchInfo');
    const searchInfoTxt = document.getElementById('searchInfoText');

    if (!searchInput) return;

    function filterList(listId, noResultId) {
        const term  = searchInput.value.toLowerCase().trim();
        const items = document.querySelectorAll(
            `#${listId} .sidebar-item:not(.no-result-message):not(.sidebar-empty)`
        );
        let count = 0;

        items.forEach(item => {
            const title = item.getAttribute('data-title') || '';
            const show  = term === '' || title.includes(term);
            item.style.display = show ? 'flex' : 'none';
            if (show) count++;
        });

        const noResult = document.getElementById(noResultId);
        if (noResult) {
            noResult.style.display = (term !== '' && count === 0) ? 'flex' : 'none';
        }

        return count;
    }

    function updateSearchInfo(a, k) {
        const term = searchInput.value.trim();
        if (!term) { searchInfo.style.display = 'none'; return; }
        searchInfoTxt.textContent = `${a + k} hasil untuk "${term}"`;
        searchInfo.style.display = 'block';
    }

    function runSearch() {
        const a = filterList('artikelList',  'noResultArtikel');
        const k = filterList('kegiatanList', 'noResultKegiatan');
        updateSearchInfo(a, k);
    }

    searchInput.addEventListener('input', runSearch);
    clearBtn?.addEventListener('click', () => { searchInput.value = ''; runSearch(); searchInput.focus(); });
    searchInput.addEventListener('keydown', e => { if (e.key === 'Escape') { searchInput.value = ''; runSearch(); } });
});
</script>
@endpush
