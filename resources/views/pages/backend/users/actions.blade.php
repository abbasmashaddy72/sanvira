<div class="flex justify-around space-x-1">
    @can('user_view')
        <button wire:click='$emit("openModal", "backend.forms.modal-user", @json(['user_id' => $id]))'
            class="rounded p-1 text-teal-600 hover:bg-teal-600 hover:text-white">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                <path fill-rule="evenodd"
                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    @endcan

    @can('user_edit')
        <button wire:click='$emit("openModal", "backend.forms.modal-user", @json(['user_id' => $id]))'
            class="text-primary hover:bg-primary rounded p-1 hover:text-white">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                </path>
            </svg>
        </button>
    @endcan

    @can('user_impersonate')
        <a href="{{ route('admin.users.impersonate', $id) }}"
            class="text-warning hover:bg-warning rounded p-1 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                <path
                    d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                </path>
            </svg>
        </a>
    @endcan
</div>
