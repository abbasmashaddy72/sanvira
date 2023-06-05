<div class="flex justify-around space-x-1">
    @can('brand_edit')
        <button wire:click='$emit("openModal", "backend.forms.modal-brand", @json(['brand_id' => $id]))'
            class="text-primary hover:bg-primary rounded p-1 hover:text-white">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                </path>
            </svg>
        </button>
    @endcan
</div>
