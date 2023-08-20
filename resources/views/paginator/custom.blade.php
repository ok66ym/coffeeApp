@if ($paginator->hasPages())
    <div class="flex justify-center items-center space-x-4 mt-2 text-lg">
        @php
            $searchValues = session('search_values') ?? [];
            $queryParams = http_build_query($searchValues);
        @endphp
        
        <!-- Previous Page Link -->
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() . '?' . $queryParams }}" class="text-orange-700 hover:text-orange-800">←</a>
        @endif

        <!-- Page Numbers -->
        @foreach ($elements as $element)
            @if (is_array($element))
                <!-- Start three pages -->
                @foreach ($element as $page => $url)
                    @if ($page <= 3)
                        @if ($page == $paginator->currentPage())
                            <span class="bg-orange-700 text-white px-4 py-2 rounded-full">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="text-orange-500 hover:text-orange-700">{{ $page }}</a>
                        @endif
                    @endif
                @endforeach

                <!-- Ellipsis -->
                @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                    <span class="mr-2">...</span>
                @endif

                <!-- Last page -->
                @if ($paginator->currentPage() != $paginator->lastPage() && $paginator->lastPage() > 4)
                    <a href="{{ $paginator->url($paginator->lastPage()) }}" class="text-orange-500 hover:text-orange-700">{{ $paginator->lastPage() }}</a>
                @endif
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() . '?' . $queryParams }}" class="ml-4 text-orange-700 hover:text-orange-800">→</a>
        @endif
    </div>
@endif
