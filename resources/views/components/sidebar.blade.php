<div class="sidebar">
    {{-- Artikel Terbaru --}}
    <div class="sidebar-section">
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
            <ul class="sidebar-list">
                @forelse($popularArticles ?? [] as $index => $article)
                    <li class="sidebar-item">
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
    <div class="sidebar-section mt-4">
        <div class="sidebar-box">
            <h6>Kegiatan Mendatang</h6>
            <ul class="sidebar-list">
                @forelse($upcomingEvents ?? [] as $index => $event)
                    <li class="sidebar-item">
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
            const sidebarSections = document.querySelectorAll('.sidebar-section');
            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                sidebarSections.forEach(function(section) {
                    const items = section.querySelectorAll('.sidebar-item');
                    let sectionHasVisibleItems = false;
                    items.forEach(function(item) {
                        const itemName = item.querySelector('strong')?.textContent.toLowerCase();
                        if (itemName && itemName.includes(searchTerm)) {
                            item.style.display = 'flex';
                            sectionHasVisibleItems = true;
                        } else {
                            item.style.display = 'none';
                        }
                    });
                    if (sectionHasVisibleItems) {
                        section.style.display = '';
                    } else {
                        section.style.display = searchTerm ? 'none' : '';
                    }
                });
            });
        }
    });
</script>
@endpush
