<div x-data class="flex flex-col">
    <input x-ref="input" type="text"
        class="m-1 block rounded-md border-gray-300 pr-8 text-sm leading-4 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
        wire:change="doTextFilter('{{ $index }}', $event.target.value)" x-on:change="$refs.input.value = ''" />
    <div class="max-w-48 flex flex-wrap space-x-1">
        @foreach ($this->activeTextFilters[$index] ?? [] as $key => $value)
            <button wire:click="removeTextFilter('{{ $index }}', '{{ $key }}')"
                class="m-1 flex items-center space-x-1 rounded-full bg-gray-300 pl-1 text-xs uppercase tracking-wide text-white hover:bg-red-600 focus:outline-none">
                <span>{{ $this->getDisplayValue($index, $value) }}</span>
                <x-icons.x-circle class="h-5 w-5 stroke-current text-red-500" />
            </button>
        @endforeach
    </div>
</div>
