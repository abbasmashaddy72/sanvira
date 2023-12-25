<div class="dark:text-white">
    <form wire:submit.prevent="submit">
        @csrf

        <div class="grid grid-cols-2 gap-2">
            <x-input name="title" wire:model='title' label="Title" type="text" />

            <x-input name="tags" wire:model='tags' label="Tags" type="text" />

            <x-textarea name="excerpt" wire:model='excerpt' label="Excerpt" required />

            <x-backend.image-upload :images="$this->image" :isUploaded="$this->isUploaded" label="{{ __('Upload Image') }}" name="image"
                model="image" required />
        </div>

        <div class="w-full">
            <x-backend.ckEditor idPrefix="body1en" lang="EN" name="description" label="{{ __('Description') }}"
                wire:model='description' />
        </div>

        <div class="mt-4 grid grid-cols-6 gap-2">
            <div
                class="col-span-6 mt-4 items-center justify-end rounded-lg bg-white px-4 py-3 dark:bg-gray-800 sm:flex sm:px-4">
                <button class="btn btn-primary dark:text-white dark:hover:text-gray-200" type="submit">
                    @if (!empty($title))
                        {{ __('Update') }}
                    @else
                        {{ __('Save') }}
                    @endif
                </button>
            </div>
        </div>
    </form>
</div>
