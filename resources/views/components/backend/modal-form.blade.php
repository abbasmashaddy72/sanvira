@props(['formAction' => false, 'title' => null])

<div class="dark:bg-gray-900 dark:text-white">
    @if ($formAction)
        <form wire:submit="{{ $formAction }}">
    @endif
    <div class="border-gray-150 border-b bg-white p-4 dark:border-gray-700 dark:bg-gray-800 sm:px-6 sm:py-4">
        @if (!empty($title) && $formAction != 'delete')
            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">
                {{ __('Update') }} {{ $title }}
            </h3>
        @elseif($formAction == 'delete')
            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">
                {{ __('Delete') }} {{ $title }}
            </h3>
        @else
            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">
                {{ __('Add') }}
            </h3>
        @endif
    </div>
    <div class="bg-white px-4 dark:bg-gray-800 sm:p-6">
        {{ $slot }}
    </div>

    <div class="justify-between bg-white px-4 pb-5 dark:bg-gray-800 sm:flex sm:px-4">
        @if ($formAction == 'delete')
            <button wire:click="$dispatch('closeModal')" type="button"
                class="btn btn-primary dark:text-white dark:hover:text-gray-200">Close</button>

            <button type="submit" class="btn btn-danger dark:text-white dark:hover:text-gray-200">Delete</button>
        @else
            <button wire:click="$dispatch('closeModal')" type="button"
                class="btn btn-danger dark:text-white dark:hover:text-gray-200">Close</button>
            <button class="btn btn-primary dark:text-white dark:hover:text-gray-200" type="submit">
                @if (!empty($title))
                    {{ __('Update') }}
                @else
                    {{ __('Save') }}
                @endif
            </button>
        @endif
    </div>
    @if ($formAction)
        </form>
    @endif
</div>
