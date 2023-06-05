<div class="flex justify-between">
    <!-- Previous Page Link -->
    @if ($paginator->onFirstPage())
        <div
            class="relative flex w-32 items-center justify-between rounded-md border border-gray-300 bg-gray-50 px-4 py-2 text-sm font-medium leading-5 text-gray-400">
            <x-icons.arrow-left />
            {{ __('Previous') }}
        </div>
    @else
        <button wire:click="previousPage" id="pagination-mobile-page-previous"
            class="focus:shadow-outline-blue relative flex w-32 items-center justify-between rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out hover:text-gray-500 focus:border-blue-300 focus:outline-none active:bg-gray-100 active:text-gray-700">
            <x-icons.arrow-left />
            {{ __('Previous') }}
        </button>
    @endif


    <!-- Next Page pnk -->
    @if ($paginator->hasMorePages())
        <button wire:click="nextPage" id="pagination-mobile-page-next"
            class="focus:shadow-outline-blue relative flex w-32 items-center items-center justify-between rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out hover:text-gray-500 focus:border-blue-300 focus:outline-none active:bg-gray-100 active:text-gray-700">
            {{ __('Next') }}
            <x-icons.arrow-right />
        </button>
    @else
        <div
            class="relative flex w-32 items-center justify-between rounded-md border border-gray-300 bg-gray-50 px-4 py-2 text-sm font-medium leading-5 text-gray-400">
            {{ __('Next') }}
            <x-icons.arrow-right class="inline" />
        </div>
    @endif
</div>
