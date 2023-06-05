<div x-data="{
    rules: @if ($persistKey) $persist('').as('{{ $persistKey }}') @else '' @endif,
    init() {
        Livewire.on('complexQuery', rules => this.rules = rules)
        if (this.rules && this.rules !== '') {
            $wire.set('rules', this.rules)
            $wire.runQuery()
        }
    }
}" class="">
    <div class="my-4 flex justify-between text-xl font-medium uppercase leading-none tracking-wide">
        <span>Query Builder</span>
        <span>
            @if ($errors->any())
                <div class="text-red-500">You have missing values in your rules</div>
            @endif
        </span>
    </div>

    @if (count($this->rules[0]['content']))
        <div
            class="@if ($errors->any()) text-red-200 @else text-green-100 @endif my-4 whitespace-pre-wrap rounded bg-gray-500 px-4 py-2">
            {{ $this->rulesString }}@if ($errors->any()) Invalid rules
            @endif
        </div>
    @endif

    <div>@include('datatables::complex-query-group', ['rules' => $rules, 'parentIndex' => null])</div>

    @if (count($this->rules[0]['content']))
        @unless ($errors->any())
            <div class="w-full justify-between pt-2 sm:flex">
                <div>
                    {{-- <button class="px-3 py-2 text-white bg-blue-500 rounded" wire:click="runQuery">Apply Query</button> --}}
                </div>
                <div class="mt-2 sm:mt-0 sm:flex sm:space-x-2">
                    @isset($savedQueries)
                        <div class="flex items-center space-x-2" x-data="{
                            name: null,
                            saveQuery() {
                                $wire.call('saveQuery', this.name)
                                this.name = null
                            }
                        }">
                            <input x-model="name" wire:loading.attr="disabled" x-on:keydown.enter="saveQuery"
                                placeholder="save as..."
                                class="block flex-grow rounded-md border border-gray-300 px-3 py-3 text-sm leading-4 text-gray-900 shadow-sm focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                            <button x-bind:disabled="!name" x-show="rules" x-on:click="saveQuery"
                                class="flex items-center space-x-2 rounded-md border border-green-400 bg-white px-3 py-0.5 text-xs font-medium uppercase leading-4 tracking-wider text-green-500 hover:bg-green-200 focus:outline-none disabled:pointer-events-none disabled:border-gray-300 disabled:text-gray-300 disabled:hover:bg-white">
                                <span>{{ __('Save') }}</span>
                                <span wire:loading.remove>
                                    <x-icons.check-circle class="m-2" />
                                </span>
                                <span wire:loading>
                                    <x-icons.cog class="m-2 animate-spin" />
                                </span>
                            </button>
                        </div>
                    @endisset
                    <button x-show="rules" wire:click="resetQuery"
                        class="flex items-center space-x-2 rounded-md border border-red-400 bg-white px-3 text-xs font-medium uppercase leading-4 tracking-wider text-red-500 hover:bg-red-200 focus:outline-none">
                        <span>{{ __('Reset') }}</span>
                        <x-icons.x-circle class="m-2" />
                    </button>
                </div>
            </div>
        @endif

        @endif
        @if (count($savedQueries ?? []))
            <div>
                <div class="my-4 mt-8 text-xl font-medium uppercase leading-none tracking-wide">Saved Queries</div>
                <div class="grid gap-2 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
                    @foreach ($savedQueries as $saved)
                        <div class="flex" wire:key="{{ $saved['id'] }}">
                            <button wire:click="loadRules({{ json_encode($saved['rules']) }})" wire:loading.attr="disabled"
                                class="flex flex-grow items-center space-x-2 rounded-md rounded-r-none border border-r-0 border-blue-400 bg-white p-2 px-3 text-xs font-medium uppercase leading-4 tracking-wider text-blue-500 hover:bg-blue-200 focus:outline-none">{{ $saved['name'] }}</button>
                            <button wire:click="deleteRules({{ $saved['id'] }})" wire:loading.attr="disabled"
                                class="flex items-center space-x-2 rounded-md rounded-l-none border border-red-400 bg-white p-2 px-3 text-xs font-medium uppercase leading-4 tracking-wider text-red-500 hover:bg-red-200 focus:outline-none">
                                <x-icons.x-circle wire:loading.remove />
                                <x-icons.cog wire:loading class="h-6 w-6 animate-spin" />
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
