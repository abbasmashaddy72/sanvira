<x-backend.modal-form form-action="add">
    <x-slot name="title">
        Update {{ $name }}
    </x-slot>

    <x-slot name="content">
        <x-dialog z-index="z-50" blur="md" align="center" />
        <div class="grid-cols-2 gap-2 row-gap-0 sm:grid">
            <x-input name="name" label="Name" type="text" wire:model.defer='name' />

            <x-input name="country" label="Country" type="text" wire:model.defer='country' />

            <x-input name="city" label="City" type="text" wire:model.defer='city' />

            <x-input name="year_range" label="Year Range" type="text" wire:model.defer='year_range' />

            <x-textarea name="feedback" label="Feedback" type="text" wire:model.defer='feedback' />

            <div class="card">
                <div class="card-body">
                    @if (!is_null($images))
                        Photo Preview:
                        <div class="grid grid-cols-5 gap-1">
                            @foreach ($images as $key => $image)
                                <div class="relative">
                                    <img class="object-cover w-10 h-10 rounded-md"
                                        src="{{ $this->isUploaded ? $image->temporaryUrl() : asset('storage/' . $image) }}">
                                    <button type="button"
                                        wire:click='deleteImage({{ $supplier_project_id }}, {{ $key }})'>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="absolute text-red-500 bg-white rounded-xl hover:text-red-600 -top-2 right-2"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-x-circle">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="15" y1="9" x2="9" y2="15">
                                            </line>
                                            <line x1="9" y1="9" x2="15" y2="15">
                                            </line>
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="mb-3">
                        <x-input name="images" label="Upload Images" type="file" wire:model.defer='images'
                            multiple />
                        <div wire:loading wire:target="images">Uploading...</div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <x-backend.ckEditor id="body1en" lang="EN" name="description" label="Description"
                wire:model.defer='description' />
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot>
</x-backend.modal-form>
