<a href="{{ route('supplier_profile', ['profile' => $item->id]) }}">
    <div
        class="relative p-6 overflow-hidden text-center transition-all duration-500 ease-in-out bg-white shadow group dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-xl dark:bg-slate-900">
        <div class="relative -m-3 overflow-hidden text-transparent">
            <img class="object-cover w-full h-32 mx-auto rounded-lg" src="{{ asset('storage/' . $item->logo) }}" />
        </div>

        <div class="mt-6">
            <p class="text-lg font-medium transition-all duration-500 ease-in-out group-hover:text-white">
                {{ $item->company_name }}</p>
        </div>
    </div>
</a>
