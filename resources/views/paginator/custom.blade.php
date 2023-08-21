@if ($paginator->hasPages())
    <div class="flex justify-center items-center space-x-4 mt-2 text-lg">

        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <span class="text-gray-400">←</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="text-orange-700 hover:text-orange-800">←</a>
        @endif

        <!-- Page Numbers -->
        @if ($paginator->lastPage() <= 7)
            @foreach(range(1, $paginator->lastPage()) as $page)
                @if ($page == $paginator->currentPage())
                    <span class="bg-orange-700 text-white px-4 py-2 rounded-full">{{ $page }}</span>
                @else
                    <a href="{{ $paginator->url($page) }}" class="text-orange-500 hover:text-orange-700">{{ $page }}</a>
                @endif
            @endforeach
        @else
            <!-- Calculate the range of pages to show -->
            @php
                $start = max(1, $paginator->currentPage() - 3);
                $end = min($paginator->lastPage(), $paginator->currentPage() + 3);

                // Adjust if close to the bounds
                if ($paginator->currentPage() <= 4) {
                    $end = 7;
                } elseif ($paginator->lastPage() - $paginator->currentPage() <= 3) {
                    $start = $paginator->lastPage() - 6;
                }
            @endphp

            @if ($start > 1)
                <span>...</span>
            @endif

            @foreach(range($start, $end) as $page)
                @if ($page == $paginator->currentPage())
                    <span class="bg-orange-700 text-white px-4 py-2 rounded-full">{{ $page }}</span>
                @else
                    <a href="{{ $paginator->url($page) }}" class="text-orange-500 hover:text-orange-700">{{ $page }}</a>
                @endif
            @endforeach

            @if ($end < $paginator->lastPage())
                <span>...</span>
            @endif
        @endif

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="text-orange-700 hover:text-orange-800">→</a>
        @else
            <span class="text-gray-400">→</span>
        @endif
    </div>
@endif
