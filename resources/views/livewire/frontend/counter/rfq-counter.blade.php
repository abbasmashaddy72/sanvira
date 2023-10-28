<button onclick="Livewire.dispatch('openModal', { component: 'frontend.modal.rfq-modal' } )" class="relative flex">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 flex-1 fill-yellow-300" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="transparent">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
    </svg>
    <span
        class="top right absolute right-0 top-0 m-0 h-4 w-4 rounded-full bg-blue-600 p-0 text-center font-mono text-sm leading-tight text-white">{{ $totalProductCount }}
    </span>
</button>
