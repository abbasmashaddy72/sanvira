@props(['formAction' => false, 'title' => null])

<div>
    @if ($formAction)
        <form wire:submit.prevent="{{ $formAction }}">
    @endif
    <div class="border-gray-150 border-b bg-white p-4 sm:px-6 sm:py-4">
        @if (!empty($title))
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                {{ __('Update') }} {{ $title }}
            </h3>
        @else
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                {{ __('Add') }}
            </h3>
        @endif
    </div>
    <div class="bg-white px-4 sm:p-6">
        {{ $slot }}
    </div>

    <div class="justify-between bg-white px-4 pb-5 sm:flex sm:px-4">
        <button wire:click="$emit('closeModal')" type="button" class="btn btn-danger">Close</button>
        <button class="btn btn-primary" type="submit">
            @if (!empty($title))
                {{ __('Update') }}
            @else
                {{ __('Save') }}
            @endif
        </button>
    </div>
    @if ($formAction)
        </form>
    @endif
</div>
