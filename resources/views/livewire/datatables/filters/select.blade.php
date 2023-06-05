<div x-data class="flex flex-col">
    <div class="flex">
        <select x-ref="select" name="{{ $name }}"
            class="m-1 block w-full rounded-md border-gray-300 text-sm leading-4 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            wire:input="doSelectFilter('{{ $index }}', $event.target.value)" x-on:input="$refs.select.value=''">
            <option value=""></option>
            @foreach ($options as $value => $label)
                @if (is_object($label))
                    <option value="{{ $label->id }}">{{ $label->name }}</option>
                @elseif(is_array($label))
                    <option value="{{ $label['id'] }}">{{ $label['name'] }}</option>
                @elseif(is_numeric($value))
                    <option value="{{ $label }}">{{ $label }}</option>
                @else
                    <option value="{{ $value }}">{{ $label }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="max-w-48 flex flex-wrap space-x-1">
        @foreach ($this->activeSelectFilters[$index] ?? [] as $key => $value)
            <button wire:click="removeSelectFilter('{{ $index }}', '{{ $key }}')"
                x-on:click="$refs.select.value=''"
                class="m-1 flex items-center space-x-1 rounded-full bg-gray-300 pl-1 text-xs uppercase tracking-wide text-white hover:bg-red-600 focus:outline-none">
                <span>{{ $this->getDisplayValue($index, $value) }}</span>
                <x-icons.x-circle />
            </button>
        @endforeach
    </div>
</div>
