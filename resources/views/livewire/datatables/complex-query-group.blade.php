<div class="space-y-4">
    @foreach ($rules as $index => $rule)
        @php $key = $parentIndex !== null ? $parentIndex . '.' . $index : $index; @endphp
        <div wire:key="{{ $key }}">
            @if ($rule['type'] === 'rule')
                @include('datatables::complex-query-rule', ['parentIndex' => $key, 'rule' => $rule])
            @elseif($rule['type'] === 'group')
                <div x-data="{
                    key: '{{ collect(explode('.', $key))->join('.content.') . '.content' }}',
                    source: () => document.querySelector('[dragging]'),
                    dragstart: (e, key) => {
                        e.target.setAttribute('dragging', key)
                        e.target.classList.add('bg-opacity-20', 'bg-white')
                    },
                    dragend: (e) => {
                        e.target.removeAttribute('dragging')
                        e.target.classList.remove('bg-opacity-20', 'bg-white')
                    },
                    dragenter(e) {
                        if (e.target.closest('[drag-target]') !== this.source().closest('[drag-target]')) {
                            console.log(this.$refs.placeholder)
                            this.$refs.placeholder.appendChild(this.source())
                        }
                    },
                    drop(e) {
                        $wire.call('moveRule', this.source().getAttribute('dragging'), this.key)
                    },
                }" drag-target x-on:dragenter.prevent="dragenter" x-on:dragleave.prevent
                    x-on:dragover.prevent x-on:drop="drop"
                    class="text-gray-{{ strlen($parentIndex) > 6 ? 1 : 9 }}00 space-y-4 rounded-lg border border-blue-400 bg-blue-500 bg-opacity-10 p-4">
                    <span class="flex justify-center space-x-4">
                        <button wire:click="addRule('{{ collect(explode('.', $key))->join('.content.') . '.content' }}')"
                            class="flex items-center space-x-2 rounded-md border border-blue-400 bg-white px-3 py-2 text-xs font-medium uppercase leading-4 tracking-wider text-blue-500 hover:bg-blue-200 focus:outline-none">ADD
                            RULE</button>
                        <button
                            wire:click="addGroup('{{ collect(explode('.', $key))->join('.content.') . '.content' }}')"
                            class="flex items-center space-x-2 rounded-md border border-blue-400 bg-white px-3 py-2 text-xs font-medium uppercase leading-4 tracking-wider text-blue-500 hover:bg-blue-200 focus:outline-none">ADD
                            GROUP</button>
                    </span>
                    <div class="block items-center sm:flex">
                        <div class="flex justify-center sm:block">
                            @if (count($rule['content']) > 1)
                                <div class="mr-8">
                                    <label
                                        class="block flex justify-between rounded py-1 text-xs font-bold uppercase tracking-wide">Logic</label>
                                    <select
                                        wire:model="rules.{{ collect(explode('.', $key))->join('.content.') }}.logic"
                                        class="block w-24 rounded-md border-gray-300 text-sm leading-4 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        <option value="and">AND</option>
                                        <option value="or">OR</option>
                                    </select>
                                </div>
                            @endif
                        </div>
                        <div x-ref="placeholder" class="flex-grow space-y-4">
                            <div>
                                @include('datatables::complex-query-group', [
                                    'parentIndex' => $key,
                                    'rules' => $rule['content'],
                                    'logic' => $rule['logic'],
                                ])
                            </div>
                        </div>
                    </div>


                    <div class="flex justify-end">
                        @unless ($key === 0)
                            <button
                                wire:click="removeRule('{{ collect(explode('.', $key))->join('.content.') . '.content' }}')"
                                class="rounded bg-red-600 px-3 py-2 text-white">
                                <x-icons.trash />
                            </button>
                        @endunless
                    </div>

                </div>
            @endif
        </div>
    @endforeach
</div>
