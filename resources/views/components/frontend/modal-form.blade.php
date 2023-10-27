@props(['formAction' => false])

<div>
    @if ($formAction)
        <form wire:submit.prevent="{{ $formAction }}">
    @endif
    <div class="border-gray-150 border-b bg-white p-4 sm:px-6 sm:py-4">
        @if (isset($title))
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                {{ $title }}
            </h3>
        @endif
    </div>
    <div class="bg-white px-4 sm:p-6">
        <div class="space-y-6">
            {{ $content }}
        </div>
    </div>

    <div class="justify-between bg-white px-4 pb-5 sm:flex sm:px-4">
        <button wire:click="$emit('closeModal')" type="button"
            class="mb-2 mr-2 rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Close</button>
        <button
            class="mb-2 mr-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="submit">Submit RFQ</button>
    </div>
    @if ($formAction)
        </form>
    @endif
</div>
