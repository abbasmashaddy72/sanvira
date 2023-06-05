<div wire:click.prefetch="toggle('{{ $index }}')"
    class="@if ($column['hidden']) relative table-cell h-12 w-3 bg-blue-100 hover:bg-blue-300 overflow-none align-top group @else hidden @endif"
    style="min-width:12px; max-width:12px">
    <button class="relative h-12 w-3 focus:outline-none">
        <span
            class="absolute left-0 top-0 z-10 ml-3 hidden w-32 transform bg-blue-300 text-left text-xs font-medium uppercase leading-4 tracking-wider text-blue-700 focus:outline-none group-hover:inline-block">
            {{ str_replace('_', ' ', $column['label']) }}
        </span>
    </button>
    <svg class="absolute inset-x-0 bottom-0 w-full fill-current text-blue-100" viewBox="0 0 314.16 207.25">
        <path stroke-miterlimit="10" d="M313.66 206.75H.5V1.49l157.65 204.9L313.66 1.49v205.26z" />
    </svg>
</div>
<div class="@if ($column['hidden']) hidden @else relative h-12 overflow-hidden align-top flex table-cell @endif"
    @include('datatables::style-width')>

    @if ($column['sortable'])
        <button wire:click="sort('{{ $index }}')"
            class="flex h-full w-full items-center justify-between border-b border-gray-200 bg-gray-50 px-6 py-3 text-xs font-medium uppercase leading-4 tracking-wider text-gray-500 focus:outline-none">
            <span
                class="@if ($column['headerAlign'] === 'right') text-right @elseif($column['headerAlign'] === 'center') text-center @endif inline flex-grow"">{{ str_replace('_', ' ', $column['label']) }}</span>
            <span class="inline text-xs text-blue-400">
                @if ($sort === $index)
                    @if ($direction)
                        <x-icons.chevron-up class="h-6 w-6 stroke-current text-green-600" />
                    @else
                        <x-icons.chevron-down class="h-6 w-6 stroke-current text-green-600" />
                    @endif
                @endif
            </span>
        </button>
    @else
        <div
            class="flex h-full w-full items-center justify-between border-b border-gray-200 bg-gray-50 px-6 py-3 text-xs font-medium uppercase leading-4 tracking-wider text-gray-500 focus:outline-none">
            <span
                class="@if ($column['headerAlign'] === 'right') text-right @elseif($column['headerAlign'] === 'center') text-center @endif inline flex-grow"">{{ str_replace('_', ' ', $column['label']) }}</span>
        </div>
    @endif

    @if ($column['hideable'])
        <button wire:click.prefetch="toggle('{{ $index }}')"
            class="absolute bottom-1 right-1 focus:outline-none">
            <x-icons.arrow-circle-left class="h-3 w-3 text-gray-300 hover:text-blue-400" />
        </button>
    @endif
</div>
