@props(['formAction' => false])

<div>
    @if ($formAction)
        <form wire:submit.prevent="{{ $formAction }}">
    @endif
    <div class="p-4 bg-white border-b sm:px-6 sm:py-4 border-gray-150">
        @if (isset($title))
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                {{ $title }}
            </h3>
        @endif
    </div>
    <div class="px-4 bg-white sm:p-6">
        <div class="space-y-6">
            {{ $content }}
        </div>
    </div>

    <div class="justify-between px-4 pb-5 bg-white sm:px-4 sm:flex">
        <button wire:click="$emit('closeModal')" type="button"
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Close
            Modal</button>
        {{ $buttons }}
    </div>
    @if ($formAction)
        </form>
    @endif
</div>