@unless ($column['hidden'])
    <div @if (isset($column['tooltip']['text'])) title="{{ $column['tooltip']['text'] }}" @endif
        class="relative table-cell h-12 overflow-hidden align-top" @include('datatables::style-width')>
        @if ($column['sortable'])
            <button wire:click="sort('{{ $index }}')"
                class="@if ($column['headerAlign'] === 'right') justify-end @elseif($column['headerAlign'] === 'center') justify-center @endif flex h-full w-max items-center border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500 focus:outline-none">
                <span class="inline">{{ str_replace('_', ' ', $column['label']) }}</span>
                <span class="inline text-xs text-blue-400">
                    @if ($sort === $index)
                        @if ($direction)
                            <x-icons.chevron-up wire:loading.remove class="h-6 w-6 stroke-current text-green-600" />
                        @else
                            <x-icons.chevron-down wire:loading.remove class="h-6 w-6 stroke-current text-green-600" />
                        @endif
                    @endif
                </span>
            </button>
        @else
            <div
                class="@if ($column['headerAlign'] === 'right') justify-end @elseif($column['headerAlign'] === 'center') justify-center @endif flex h-full w-full items-center border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500 focus:outline-none">
                <span class="inline">{{ str_replace('_', ' ', $column['label']) }}</span>
            </div>
        @endif
    </div>
    @endif
