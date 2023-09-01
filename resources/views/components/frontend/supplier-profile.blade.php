<a href="{{ route('supplier_profile', ['slug' => $item->slug]) }}"
    {{ $attributes->merge(['class' => 'relative block overflow-hidden bg-white border-2 border-gray-200 rounded-md shadow group dark:bg-slate-900 dark:shadow-gray-800 hover:border-blue-600 hover:border-2']) }}>
    <div class="block bg-white p-4 text-left dark:bg-slate-900">
        <div class="relative flex-none">
            <img src="{{ asset('storage/' . $item->logo) }}"
                onerror="this.onerror=null; this.src='https://placehold.co/1280x554';"
                class="mx-auto mb-3 h-32 w-full rounded-lg object-cover shadow-md" alt="{{ $item->company_name }}">
            @if ($item->verification)
                <span
                    class="absolute bottom-0 right-0 mb-1 mr-1 inline-flex rounded-lg text-sm font-medium text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-shield-check">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        <path d="m9 12 2 2 4-4" />
                    </svg>
                </span>
            @endif
        </div>
        <span data-tooltip-target="{{ strtolower(str_replace(' ', '_', $item->company_name)) }}"
            class="line-clamp-1 text-xl font-medium transition-all duration-500 ease-in-out group-hover:text-blue-600">{{ $item->company_name }}
        </span>
        <div id="{{ strtolower(str_replace(' ', '_', $item->company_name)) }}" role="tooltip"
            class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
            {{ $item->company_name }}
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        <div class="flex justify-between text-blue-600">
            <div class="text-sm font-medium text-gray-600 transition-all duration-500 ease-in-out">
                {{ $item->products_count }} {{ __(' Products') }}
            </div>
            <div class="flex items-center text-sm font-medium transition-all duration-500 ease-in-out">
                {{ __('View') }}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </div>
        </div>
    </div>
</a>
