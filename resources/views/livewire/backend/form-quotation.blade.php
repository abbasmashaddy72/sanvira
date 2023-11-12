<div class="dark:text-white">
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-6 gap-2">
            <div class="col-span-6 rounded-lg bg-white px-4 dark:bg-gray-800 sm:p-6">
                <p class="text-lg font-semibold">Quotation Details</p>
                <hr class="my-2 h-px border-0 bg-gray-200 dark:bg-gray-700" />
                <div class="grid grid-cols-5 items-end gap-x-2 gap-y-4">
                    <x-input name="enquiry_no" label="{{ __('Enquiry No.') }}" type="text"
                        value='{{ $data->enquiry->enquiry_no }}' disabled />

                    <x-input name="usre_name" label="{{ __('Buyer Name') }}" type="text"
                        value='{{ $data->buyer->name }}' disabled />

                    <x-input name="quotation_no" label="{{ __('Quotation No.') }}" type="text"
                        value='{{ $data->quotation_no }}' disabled />

                    <x-input name="enquiry_submission_date_time" label="{{ __('Enquiry Submission Date Time') }}"
                        type="text" value='{{ $data->enquiry_submission_date_time->toDayDateTimeString() }}'
                        disabled />

                    <x-native-select label="Select Status" placeholder="Select Status" :options="$status_enum"
                        wire:model="status" />
                </div>
            </div>

            <div class="col-span-6 overflow-hidden rounded-lg bg-white px-4 shadow-lg dark:bg-gray-800 sm:p-6">
                <p class="mb-4 text-lg font-semibold">Products Details</p>
                <hr
                    class="my-2 h-px border-0 border-t border-gray-300 bg-gray-200 dark:border-gray-600 dark:bg-gray-700" />
                <x-backend.products-table :columnKeys="[
                    'title',
                    'on_sale',
                    'pivot.size',
                    'pivot.diameter',
                    'pivot.weight',
                    'pivot.quantity_type',
                    'pivot.color',
                    'pivot.item_type',
                    'pivot.quantity',
                    'pivot.our_price',
                    'pivot.client_price',
                ]" :productData="$productData" :extraFields="[]" />
            </div>
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
