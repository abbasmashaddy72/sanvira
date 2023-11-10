<div class="dark:text-white">
    <form wire:submit.prevent="submit">
        <div class="mt-4 grid grid-cols-6 gap-2">
            <div class="grid gap-y-2">
                <x-input name="order_id" label="{{ __('Order Id') }}" type="text" wire:model='order_id' required />

                <x-native-select label="Select Status" placeholder="Select Status" :options="$status_enum"
                    wire:model="status" />
            </div>
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
