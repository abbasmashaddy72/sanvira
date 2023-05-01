<button onclick="Livewire.emit('openModal', 'frontend.modal.rfq-modal')"
    class="px-2 py-1 mb-1 leading-normal text-right text-blue-700 bg-blue-100 rounded-lg" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-shopping-bag">
        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <path d="M16 10a4 4 0 0 1-8 0"></path>
    </svg>
    RFQ ({{ $rfqCount }})
</button>