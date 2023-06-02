<div class="flex flex-col">
    <div x-data class="relative flex">
        <input x-ref="min" type="number"
            wire:input.debounce.500ms="doNumberFilterStart('{{ $index }}', $event.target.value)"
            class="block w-full pr-8 m-1 text-sm leading-4 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            placeholder="{{ __('MIN') }}" />
        <div class="absolute inset-y-0 right-0 flex items-center pr-2">
            <button x-on:click="$refs.min.value=''" wire:click="doNumberFilterStart('{{ $index }}', '')"
                class="-mb-0.5 pr-1 flex text-gray-400 hover:text-red-600 focus:outline-none" tabindex="-1">
                <x-icons.x-circle class="w-5 h-5 stroke-current" />
            </button>
        </div>
    </div>

    <div x-data class="relative flex">
        <input x-ref="max" type="number"
            wire:input.debounce.500ms="doNumberFilterEnd('{{ $index }}', $event.target.value)"
            class="block w-full pr-8 m-1 text-sm leading-4 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            placeholder="{{ __('MAX') }}" />
        <div class="absolute inset-y-0 right-0 flex items-center pr-2">
            <button x-on:click="$refs.max.value=''" wire:click="doNumberFilterEnd('{{ $index }}', '')"
                class="-mb-0.5 pr-1 flex text-gray-400 hover:text-red-600 focus:outline-none" tabindex="-1">
                <x-icons.x-circle class="w-5 h-5 stroke-current" />
            </button>
        </div>
    </div>
</div>
