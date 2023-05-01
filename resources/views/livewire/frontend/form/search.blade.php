<div>
    @if ($type == 'header')
        <form class="relative w-[46rem]" action="{{ url('searchForm') }}">
        @else
            <form class="relative max-w-4xl mx-auto" action="{{ url('searchForm') }}">
    @endif
    <input type="text" name="search"
        class="pt-4 pr-40 pb-4 pl-6 w-full h-[50px] outline-none text-black dark:text-white rounded-full bg-white/60 dark:bg-slate-900/60 shadow-md dark:shadow-gray-800"
        placeholder="Search" wire:model="query" wire:keydown.escape="resetData" wire:keydown.tab="resetData" />
    <button type="submit"
        class="btn absolute top-[2px] right-[3px] h-[46px] bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-full z-20">Search</button>

    @if (!empty($query))
        <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="resetData"></div>

        <div class="absolute z-10 w-full p-4 bg-white rounded-lg shadow-lg">
            <div wire:loading>
                <div class="p-4 text-left text-indigo-600">Searching...</div>
            </div>

            <p class="text-lg font-semibold text-center text-gray-900">Supplier Product List</p>
            @if (!empty($supplierProductsList))
                @foreach ($supplierProductsList as $i => $contact)
                    <a href="{{ route('products_details', $contact['id']) }}"
                        class="p-4 text-left text-indigo-600 hover:text-indigo-800">{{ $contact['name'] }}</a>
                @endforeach
            @else
                <div class="p-4 text-left text-indigo-600">No results!</div>
            @endif

            <p class="text-lg font-semibold text-center text-gray-900">Supplier List</p>
            @if (!empty($supplierList))
                @foreach ($supplierList as $i => $contact)
                    <a href="{{ route('supplier_profile', $contact['id']) }}"
                        class="p-4 text-left text-indigo-600 hover:text-indigo-800">{{ $contact['company_name'] }}</a>
                @endforeach
            @else
                <div class="p-4 text-left text-indigo-600">No results!</div>
            @endif

            <p class="text-lg font-semibold text-center text-gray-900">Categories List</p>
            @if (!empty($categoriesList))
                @foreach ($categoriesList as $i => $contact)
                    <a href="{{ route('products_category', $contact['id']) }}"
                        class="p-4 text-left text-indigo-600 hover:text-indigo-800">{{ $contact['name'] }}</a>
                @endforeach
            @else
                <div class="p-4 text-left text-indigo-600">No results!</div>
            @endif

            <p class="text-lg font-semibold text-center text-gray-900">Brand List</p>
            @if (!empty($brandList))
                @foreach ($brandList as $i => $contact)
                    <a href="{{ route('products_details', $contact['id']) }}"
                        class="p-4 text-left text-indigo-600 hover:text-indigo-800">{{ $contact['brand'] }}</a>
                @endforeach
            @else
                <div class="p-4 text-left text-indigo-600">No results!</div>
            @endif
        </div>
    @endif
    </form>
</div>
