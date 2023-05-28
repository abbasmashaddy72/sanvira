<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-input name="name" label="Name" type="text" wire:model.defer='name' />

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

        <table class="min-w-full mt-4 divide-y divide-gray-200 dark:bg-gray-800 dark:text-white">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase bg-gray-50 dark:bg-gray-700">
                        Sl. No.
                    </th>
                    <th
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase bg-gray-50 dark:bg-gray-700">
                        Permission
                    </th>
                    <th
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase bg-gray-50 dark:bg-gray-700">
                        Read
                    </th>
                    <th
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase bg-gray-50 dark:bg-gray-700">
                        Write
                    </th>
                    <th
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase bg-gray-50 dark:bg-gray-700">
                        Delete
                    </th>
                    <th
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase bg-gray-50 dark:bg-gray-700">
                        Other
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:text-white">
                @foreach ($groupedPermissions as $groupName => $group)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            {{ $groupName }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            @php
                                $readPermissions = [];
                                foreach ($group as $permission) {
                                    $lastWord = strtolower(collect(explode(' ', trim($permission['permission'])))->last());
                                    if (strpos($lastWord, 'list') !== false || strpos($lastWord, 'view') !== false) {
                                        $readPermissions[] = $permission['id'] . ' (' . ucwords($lastWord) . ')';
                                    }
                                }
                                $hasListAndViewById = count($readPermissions) > 0;
                                $hasReadPermissions = count($readPermissions) > 0;
                            @endphp
                            @if ($hasListAndViewById)
                                {{ implode(', ', $readPermissions) }}
                            @elseif ($hasReadPermissions)
                                {{ implode(', ', $readPermissions) }}
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            @php
                                $writePermissions = [];
                                foreach ($group as $permission) {
                                    $lastWord = strtolower(collect(explode(' ', trim($permission['permission'])))->last());
                                    if (strpos($lastWord, 'add') !== false || strpos($lastWord, 'edit') !== false) {
                                        $writePermissions[] = $permission['id'] . ' (' . ucwords($lastWord) . ')';
                                    }
                                }
                                $hasAddAndEdit = count($writePermissions) > 0;
                                $hasWritePermissions = count($writePermissions) > 0;
                            @endphp
                            @if ($hasAddAndEdit)
                                {{ implode(', ', $writePermissions) }}
                            @elseif ($hasWritePermissions)
                                {{ implode(', ', $writePermissions) }}
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            @php
                                $deletePermissions = [];
                                foreach ($group as $permission) {
                                    $lastWord = strtolower(collect(explode(' ', trim($permission['permission'])))->last());
                                    if (strpos($lastWord, 'delete') !== false) {
                                        $deletePermissions[] = $permission['id'] . ' (' . ucwords($lastWord) . ')';
                                    }
                                }
                                $hasDeletePermissions = count($deletePermissions) > 0;
                            @endphp
                            @if ($hasDeletePermissions)
                                {{ implode(', ', $deletePermissions) }}
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            @php
                                $otherPermissions = [];
                                foreach ($group as $permission) {
                                    $lastWord = strtolower(collect(explode(' ', trim($permission['permission'])))->last());
                                    if (!in_array($lastWord, ['list', 'add', 'edit', 'view', 'delete']) && !in_array($permission['id'], $readPermissions) && !in_array($permission['id'], $writePermissions) && !in_array($permission['id'], $deletePermissions)) {
                                        $otherPermissions[] = $permission['id'] . ' (' . ucwords($lastWord) . ')';
                                    }
                                }
                                $hasOtherPermissions = count($otherPermissions) > 0;
                            @endphp
                            @if ($hasOtherPermissions)
                                {{ implode(', ', $otherPermissions) }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <div class="grid grid-cols-5 gap-2">
            @foreach ($permissions as $permission)
                @php
                    echo collect(explode(' ', trim($permission->name)))->last();
                @endphp

                <x-checkbox id="{{ $permission->slug }}" label="{{ $permission->name }}"
                    wire:model.defer='permissions_array' value="{{ $permission->id }}" />
            @endforeach
        </div> --}}

    </div>
</x-backend.modal-form>
