<div x-data="{ open: {{ isset($open) && $open ? 'true' : 'false' }}, working: false }" x-cloak wire:key="delete-{{ $value }}">
    <span x-on:click="open = true">
        <button class="rounded p-1 text-red-600 hover:bg-red-600 hover:text-white">
            <x-icons.trash />
        </button>
    </span>

    <div x-show="open"
        class="fixed inset-x-0 bottom-0 z-50 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div x-show="open" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative transform overflow-hidden rounded-lg bg-gray-100 px-4 pb-4 pt-5 shadow-xl transition-all sm:w-full sm:max-w-lg sm:p-6">
            <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
                <button @click="open = false" type="button"
                    class="text-gray-400 transition duration-150 ease-in-out hover:text-gray-500 focus:text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="w-full">
                <div class="mt-3 text-center">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        {{ __('Delete') }} {{ $value }}
                    </h3>
                    <div class="mt-2">
                        <div class="mt-10 text-gray-700">
                            {{ __('Are you sure?') }}
                        </div>
                        <div class="mt-10 flex justify-center">
                            <span class="mr-2">
                                <button x-on:click="open = false" x-bind:disabled="working"
                                    class="focus:shadow-outline-teal inline-flex w-32 items-center justify-center rounded-md border border-transparent bg-gray-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm transition duration-150 ease-in-out hover:bg-gray-700 focus:border-gray-700 focus:outline-none active:bg-gray-700">
                                    {{ __('No') }}
                                </button>
                            </span>
                            <span x-on:click="working = !working">
                                <button wire:click="delete('{{ $value }}')"
                                    class="focus:shadow-outline-teal inline-flex w-32 items-center justify-center rounded-md border border-transparent bg-red-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm transition duration-150 ease-in-out hover:bg-red-700 focus:border-red-700 focus:outline-none active:bg-red-700">
                                    {{ __('Yes') }}
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
