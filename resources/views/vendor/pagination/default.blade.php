@if ($paginator->hasPages())
    <div class="join grid grid-cols-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button class="join-item btn btn-outline" disabled>Previous page</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="join-item btn btn-outline">Previous page</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="join-item btn btn-outline">Next</a>
        @else
            <button class="join-item btn btn-outline" disabled>Next</button>
        @endif
    </div>
@endif
