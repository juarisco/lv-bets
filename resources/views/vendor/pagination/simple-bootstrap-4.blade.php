@if ($paginator->hasPages())
    <nav class="blog-pagination mt-3">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="btn btn-outline-secondary disabled">Newer</a>
        @else            
            <a class="btn btn-outline-primary" href="{{ $paginator->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Newer</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())    
            <a class="btn btn-outline-primary" href="{{ $paginator->nextPageUrl() }}">Older</a>
        @else            
            <a class="btn btn-outline-secondary disabled">Older</a>
        @endif
    </nav>
@endif   

