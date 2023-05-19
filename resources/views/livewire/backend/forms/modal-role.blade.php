<x-backend.modal-form form-action="add">
    <x-slot name="title">
        Update {{ $name }}
    </x-slot>

    <x-slot name="content">
        <div class="grid gap-y-2">
            <x-input name="name" label="Name" type="text" wire:model.defer='name' />

            <div class="grid grid-cols-5 gap-2">
                @foreach ($permissions as $permission)
                    <x-checkbox id="{{ $permission->slug }}" label="{{ $permission->name }}"
                        wire:model.defer='permissions_array.{{ $permission->id }}' />
                @endforeach
            </div>
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot>
</x-backend.modal-form>
