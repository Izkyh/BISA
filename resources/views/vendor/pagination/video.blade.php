@if ($paginator->hasPages())
    <ul class="pagination justify-content-center gap-2 my-4">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link px-4 py-2 rounded-3">Prev</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link px-4 py-2 rounded-3"
                   href="{{ $paginator->previousPageUrl() }}" rel="prev">Prev</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled">
                    <span class="page-link rounded-3">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link fw-semibold rounded-3">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link rounded-3" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link px-4 py-2 rounded-3"
                   href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link px-4 py-2 rounded-3">Next</span>
            </li>
        @endif
    </ul>
@endif
