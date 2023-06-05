<div x-data class="flex flex-col">
    <div class="relative flex w-full">
        <input x-ref="start"
            class="m-1 block w-full rounded-md border-gray-300 pr-8 text-sm leading-4 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            type="date" wire:change="doDateFilterStart('{{ $index }}', $event.target.value)"
            style="padding-bottom: 5px" />
        <div class="absolute inset-y-0 right-0 flex items-center pr-2">
            <button x-on:click="$refs.start.value=''" wire:click="doDateFilterStart('{{ $index }}', '')"
                class="-mb-0.5 flex pr-1 text-gray-400 hover:text-red-600 focus:outline-none" tabindex="-1">
                <x-icons.x-circle class="h-5 w-5 stroke-current" />
            </button>
        </div>
    </div>
    <div class="relative flex w-full items-center">
        <input x-ref="end"
            class="m-1 block w-full rounded-md border-gray-300 pr-8 text-sm leading-4 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            type="date" wire:change="doDateFilterEnd('{{ $index }}', $event.target.value)"
            style="padding-bottom: 5px" />
        <div class="absolute inset-y-0 right-0 flex items-center pr-2">
            <button x-on:click="$refs.end.value=''" wire:click="doDateFilterEnd('{{ $index }}', '')"
                class="-mb-0.5 flex pr-1 text-gray-400 hover:text-red-600 focus:outline-none" tabindex="-1">
                <x-icons.x-circle class="h-5 w-5 stroke-current" />
            </button>
        </div>
    </div>
</div>
