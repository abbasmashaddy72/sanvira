<x-frontend.index-container class="mt-16">
    <div
        class="grid items-center justify-center text-center @if ($type == 'common-top') grid-cols-2 h-32 @else grid-cols-1 h-80 @endif">
        <div class="">
            <h1
                class="text-4xl font-bold leading-normal lg:leading-normal @if ($type == 'common-top') lg:text-3xl @else lg:text-5xl @endif">
                Your
                <span class="text-blue-600">SuperCharged</span>
                Procurement Marketplace
            </h1>
            @if ($type == 'common-top')
            @else
                <p class="max-w-xl mx-auto mt-5 text-lg">Reinventing the way organization procure by digitizing
                    construction commerce using state of art technology</p>
            @endif
        </div>
        <div class="">
            <form class="relative max-w-4xl mx-auto" action="{{ url('searchForm') }}">
                <input type="text" name="search"
                    class="pt-4 pr-40 pb-4 pl-6 w-full h-[50px] outline-none text-black dark:text-white rounded-full bg-white/60 dark:bg-slate-900/60 shadow-md dark:shadow-gray-800"
                    placeholder="Search" wire:model="query" wire:keydown.escape="resetData"
                    wire:keydown.tab="resetData" />
                <button type="submit"
                    class="btn absolute top-[2px] right-[3px] h-[46px] bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-full z-20">Search</button>

                @if (!empty($query))
                    <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="resetData"></div>

                    <div class="absolute z-10 w-full p-4 bg-white rounded-lg shadow-lg">
                        <div wire:loading>
                            <div class="p-4 text-left text-indigo-600">Searching...</div>
                        </div>

                        <p class="text-lg font-semibold text-center text-gray-900">Supplier Product List</p>
                        @forelse ($supplierProductsList as $item)
                            <a href="{{ route('products_details', $item->id) }}"
                                class="p-4 text-left text-indigo-600 hover:text-indigo-800">{{ $item->name }}</a>
                        @empty
                            <div class="p-4 text-left text-indigo-600">No results!</div>
                        @endforelse

                        <p class="text-lg font-semibold text-center text-gray-900">Supplier List</p>
                        @forelse ($supplierList as $item)
                            <a href="{{ route('supplier_profile', $item->id) }}"
                                class="p-4 text-left text-indigo-600 hover:text-indigo-800">{{ $item->company_name }}</a>
                        @empty
                            <div class="p-4 text-left text-indigo-600">No results!</div>
                        @endforelse

                        <p class="text-lg font-semibold text-center text-gray-900">Categories List</p>
                        @forelse ($categoriesList as $item)
                            <a href="{{ route('products_category', $item->id) }}"
                                class="p-4 text-left text-indigo-600 hover:text-indigo-800">{{ $item->name }}</a>
                        @empty
                            <div class="p-4 text-left text-indigo-600">No results!</div>
                        @endforelse

                        <p class="text-lg font-semibold text-center text-gray-900">Brand List</p>
                        @forelse ($brandList as $item)
                            <a href="{{ route('products_details', $item->id) }}"
                                class="p-4 text-left text-indigo-600 hover:text-indigo-800">{{ $item->name }}</a>
                        @empty
                            <div class="p-4 text-left text-indigo-600">No results!</div>
                        @endforelse
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-frontend.index-container>
