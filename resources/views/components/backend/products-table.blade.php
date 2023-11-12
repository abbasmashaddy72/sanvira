@props(['columnKeys', 'productData', 'extraFields'])

<div class="soft-scrollbar overflow-x-auto rounded-lg">
    <table
        class="min-w-full divide-y divide-gray-200 border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
        <thead class="bg-gray-100 dark:bg-gray-600">
            <tr>
                @foreach ($columnKeys as $key)
                    <th scope="col"
                        class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase tracking-wider dark:text-white">
                        {{ str_replace('_', ' ', Str::afterLast($key, '.')) }}
                    </th>
                @endforeach
                <!-- Add extra fields in the header -->
                @foreach ($extraFields as $field)
                    <th scope="col"
                        class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase tracking-wider dark:text-white">
                        {{ str_replace('_', ' ', Str::afterLast($field, '.')) }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
            @foreach ($productData as $index => $item)
                <tr class="{{ $index % 2 === 0 ? 'bg-white dark:bg-gray-800' : 'bg-gray-100 dark:bg-gray-700' }}">
                    @foreach ($columnKeys as $key)
                        <td class="whitespace-nowrap px-6 py-4">
                            {{ data_get($item, $key) }}
                        </td>
                    @endforeach
                    <!-- Add extra fields in the rows -->
                    @foreach ($extraFields as $field)
                        <td class="whitespace-nowrap px-6 py-4">
                            <x-input wire:model="{{ $field . '.' . $item->pivot->id }}"
                                label='{{ data_get($item->pivot, $field) }}' />
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
