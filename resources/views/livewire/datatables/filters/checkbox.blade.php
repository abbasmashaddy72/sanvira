<div @if (isset($column['tooltip']['text'])) title="{{ $column['tooltip']['text'] }}" @endif
    class="flex h-full flex-col items-center space-y-2 overflow-hidden border-b border-gray-200 bg-blue-100 px-6 py-5 text-left align-top text-xs font-medium uppercase leading-4 tracking-wider text-gray-500 focus:outline-none">
    <div>{{ __('SELECT ALL') }}</div>
    <div>
        <input type="checkbox" wire:click="toggleSelectAll"
            class="form-checkbox mt-1 h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
            @if ($this->results->total() === count($visibleSelected)) checked @endif />
    </div>
</div>
