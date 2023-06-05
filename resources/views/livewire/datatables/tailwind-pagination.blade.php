<div class="pagination flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300">
    <!-- Previous Page Link -->
    @if ($paginator->onFirstPage())
        <button class="relative inline-flex items-center bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-500"
            disabled>
            <span>&laquo;</span>
        </button>
    @else
        <button wire:click="previousPage" id="pagination-desktop-page-previous"
            class="focus:shadow-outline-blue relative inline-flex items-center bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out hover:text-gray-400 focus:z-10 focus:border-blue-300 focus:outline-none active:bg-gray-100 active:text-gray-500">
            <span>&laquo;</span>
        </button>
    @endif

    <div class="divide-x divide-gray-300">
        @foreach ($elements as $element)
            @if (is_string($element))
                <button
                    class="relative -ml-px inline-flex items-center bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700"
                    disabled>
                    <span>{{ $element }}</span>
                </button>
            @endif

            <!-- Array Of Links -->

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <button wire:click="gotoPage({{ $page }})" id="pagination-desktop-page-{{ $page }}"
                        class="focus:shadow-outline-blue {{ $page === $paginator->currentPage() ? 'bg-gray-200' : 'bg-white' }} relative -mx-1 inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out hover:text-gray-500 focus:z-10 focus:border-blue-300 focus:outline-none active:bg-gray-100 active:text-gray-700">
                        {{ $page }}
                    </button>
                @endforeach
            @endif
        @endforeach
    </div>

    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
        <button wire:click="nextPage" id="pagination-desktop-page-next"
            class="bg-red focus:shadow-outline-blue relative -ml-px inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out hover:text-gray-400 focus:z-10 focus:border-blue-300 focus:outline-none active:bg-gray-100 active:text-gray-500">
            <span>&raquo;</span>
        </button>
    @else
        <button
            class="relative -ml-px inline-flex items-center bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-500"
            disabled><span>&raquo;</span></button>
    @endif
</div>
