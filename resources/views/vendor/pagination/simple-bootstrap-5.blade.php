@if ($paginator->hasPages())
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center mb-0" style="gap:4px;">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link" style="border-radius:8px;">
                    <i class="bi bi-chevron-left"></i>
                </span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                   rel="prev" style="border-radius:8px;">
                    <i class="bi bi-chevron-left"></i>
                </a>
            </li>
        @endif

        {{-- Page Numbers --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">
                    <span class="page-link" style="border-radius:8px;">{{ $element }}</span>
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <span class="page-link" style="border-radius:8px;">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}" style="border-radius:8px;">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}"
                   rel="next" style="border-radius:8px;">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link" style="border-radius:8px;">
                    <i class="bi bi-chevron-right"></i>
                </span>
            </li>
        @endif

    </ul>
</nav>
@endif
