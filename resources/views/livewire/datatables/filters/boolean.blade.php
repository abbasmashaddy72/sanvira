<div x-data class="flex flex-col">
    <select x-ref="select" name="{{ $name }}"
        class="m-1 block rounded-md border-gray-300 text-sm leading-4 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
        wire:input="doBooleanFilter('{{ $index }}', $event.target.value)" x-on:input="$refs.select.value=''">
        <option value=""></option>
        <option value="0">{{ __('No') }}</option>
        <option value="1">{{ __('Yes') }}</option>
    </select>

    <div class="max-w-48 flex flex-wrap space-x-1">
        @isset($this->activeBooleanFilters[$index])
            @if ($this->activeBooleanFilters[$index] == 1)
                <button wire:click="removeBooleanFilter('{{ $index }}')"
                    class="m-1 flex items-center space-x-1 rounded-full bg-gray-300 pl-1 text-xs uppercase tracking-wide text-white hover:bg-red-600 focus:outline-none">
                    <span>{{ __('YES') }}</span>
                    <x-icons.x-circle />
                </button>
            @elseif(strlen($this->activeBooleanFilters[$index]) > 0)
                <button wire:click="removeBooleanFilter('{{ $index }}')"
                    class="m-1 flex items-center space-x-1 rounded-full bg-gray-300 pl-1 text-xs uppercase tracking-wide text-white hover:bg-red-600 focus:outline-none">
                    <span>{{ __('No') }}</span>
                    <x-icons.x-circle />
                </button>
            @endif
        @endisset
    </div>
</div>
