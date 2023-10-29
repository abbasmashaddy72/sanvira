<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-input name="name" label="{{ __('Name') }}" type="text" wire:model='name' required />

        @php
            $groupedPermissions = [];
            
            foreach ($permissions as $permission) {
                $name = $permission['name'];
            
                $isGrouped = false;
                $groupKey = '';
            
                $words = explode(' ', $name);
                $lastWord = array_pop($words);
                $nameWithoutLastWord = implode(' ', $words);
            
                $checkWords = ['list', 'add', 'edit', 'view', 'delete'];
                foreach ($checkWords as $word) {
                    if (stripos($lastWord, $word) !== false) {
                        $isGrouped = true;
                        $groupKey = $nameWithoutLastWord;
                        break;
                    }
                }
            
                if ($isGrouped) {
                    if (!isset($groupedPermissions[$groupKey])) {
                        $groupedPermissions[$groupKey] = [];
                    }
            
                    $groupedPermissions[$groupKey][] = [
                        'id' => $permission['id'],
                        'name' => $groupKey,
                        'lastWord' => $lastWord,
                        'permission' => $permission['name'],
                    ];
                } else {
                    $groupedPermissions[$name] = [
                        [
                            'id' => $permission['id'],
                            'name' => $name,
                            'lastWord' => $lastWord,
                            'permission' => $permission['name'],
                        ],
                    ];
                }
            }
        @endphp

        <table
            class="mt-4 min-w-full divide-y divide-gray-200 border-2 border-gray-200 shadow dark:bg-gray-800 dark:text-white">
            <thead class="rounded-t-lg bg-gray-200 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Sl. No.') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Permission') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Read') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Write') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Delete') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Others') }}
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 rounded-b-lg bg-white dark:bg-gray-900 dark:text-white">
                @foreach ($groupedPermissions as $groupName => $group)
                    <tr
                        class="@if ($loop->index % 2) bg-gray-50 dark:bg-gray-800 @else dark:bg-gray-900 bg-white @endif border-b dark:border-gray-700">
                        <td class="whitespace-nowrap px-6 py-2.5 text-sm text-gray-500">
                            {{ $loop->iteration }}
                        </td>
                        <td class="whitespace-nowrap px-6 py-2.5 font-medium text-gray-900 dark:text-white">
                            {{ $groupName }}
                        </td>
                        <td class="whitespace-nowrap px-6 py-2.5 text-sm text-gray-500">
                            @php
                                $readPermissions = [];
                                foreach ($group as $permission) {
                                    $lastWord = strtolower(collect(explode(' ', trim($permission['permission'])))->last());
                                    if (strpos($lastWord, 'list') !== false || strpos($lastWord, 'view') !== false) {
                                        $readPermissions[] = $permission['id'] . ' (' . ucwords($lastWord) . ')';
                                    }
                                }
                            @endphp
                            <div class="flex space-x-4">
                                @foreach ($group as $permission)
                                    @php
                                        $lastWord = strtolower(collect(explode(' ', trim($permission['permission'])))->last());
                                    @endphp
                                    @if (strpos($lastWord, 'list') !== false || strpos($lastWord, 'view') !== false)
                                        <x-checkbox id="{{ $permission['id'] }}" label="{{ ucwords($lastWord) }}"
                                            wire:model='permissions_array' value="{{ $permission['id'] }}" />
                                    @endif
                                @endforeach
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-6 py-2.5 text-sm text-gray-500">
                            @php
                                $writePermissions = [];
                                foreach ($group as $permission) {
                                    $lastWord = strtolower(collect(explode(' ', trim($permission['permission'])))->last());
                                    if (strpos($lastWord, 'add') !== false || strpos($lastWord, 'edit') !== false) {
                                        $writePermissions[] = $permission['id'] . ' (' . ucwords($lastWord) . ')';
                                    }
                                }
                            @endphp
                            <div class="flex space-x-4">
                                @foreach ($group as $permission)
                                    @php
                                        $lastWord = strtolower(collect(explode(' ', trim($permission['permission'])))->last());
                                    @endphp
                                    @if (strpos($lastWord, 'add') !== false || strpos($lastWord, 'edit') !== false)
                                        <x-checkbox id="{{ $permission['id'] }}" label="{{ ucwords($lastWord) }}"
                                            wire:model='permissions_array' value="{{ $permission['id'] }}" />
                                    @endif
                                @endforeach
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-6 py-2.5 text-sm text-gray-500">
                            @php
                                $deletePermissions = [];
                                foreach ($group as $permission) {
                                    $lastWord = strtolower(collect(explode(' ', trim($permission['permission'])))->last());
                                    if (strpos($lastWord, 'delete') !== false) {
                                        $deletePermissions[] = $permission['id'] . ' (' . ucwords($lastWord) . ')';
                                    }
                                }
                            @endphp
                            <div class="flex space-x-4">
                                @foreach ($group as $permission)
                                    @php
                                        $lastWord = strtolower(collect(explode(' ', trim($permission['permission'])))->last());
                                    @endphp
                                    @if (strpos($lastWord, 'delete') !== false)
                                        <x-checkbox id="{{ $permission['id'] }}" label="{{ ucwords($lastWord) }}"
                                            wire:model='permissions_array' value="{{ $permission['id'] }}" />
                                    @endif
                                @endforeach
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-6 py-2.5 text-sm text-gray-500">
                            <div class="flex space-x-4">
                                @foreach ($group as $permission)
                                    @php
                                        $lastWord = strtolower(collect(explode(' ', trim($permission['permission'])))->last());
                                    @endphp
                                    @if (
                                        !in_array($lastWord, ['list', 'add', 'edit', 'view', 'delete']) &&
                                            !in_array($permission['id'], $readPermissions) &&
                                            !in_array($permission['id'], $writePermissions) &&
                                            !in_array($permission['id'], $deletePermissions))
                                        <x-checkbox id="{{ $permission['id'] }}" label="{{ $groupName }}"
                                            wire:model='permissions_array' value="{{ $permission['id'] }}" />
                                    @endif
                                @endforeach
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-backend.modal-form>
