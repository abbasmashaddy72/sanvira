<div>
    <form wire:submit.prevent="add">
        <div class="grid grid-cols-3 gap-2">
            <div>
                @if ($this->home_image)
                    <div class="my-4">
                        <div class="mb-2">
                            <label class="block">
                                <x-label label="Uploaded Home Image Preview" />
                                <img src="{{ $this->homeImageIsUploaded ? $this->home_image->temporaryUrl() : url('storage/' . $this->home_image) }}"
                                    class="mt-2" width="250" height="300">
                            </label>
                        </div>
                    </div>
                @endif

                <div class="my-4">
                    <div class="mb-2">
                        <label class="block">
                            <x-label label="Home Image" />
                            <input type="file" accept="image/*" wire:model="home_image"
                                class="block w-full mt-2 text-xl font-normal text-gray-500 border rounded outline-none focus:border-blue-400 focus:shadow">
                        </label>
                    </div>
                    <x-errors name="home_image" />
                </div>
            </div>

            <div>
                @if ($this->logo)
                    <div class="my-4">
                        <div class="mb-2">
                            <label class="block">
                                <x-label label="Uploaded Logo Preview" />
                                <img src="{{ $this->logoIsUploaded ? $this->logo->temporaryUrl() : url('storage/' . $this->logo) }}"
                                    class="mt-2" width="250" height="300">
                            </label>
                        </div>
                    </div>
                @endif

                <div class="my-4">
                    <div class="mb-2">
                        <label class="block">
                            <x-label label="Logo" />
                            <input type="file" accept="image/*" wire:model="logo"
                                class="block w-full mt-2 text-xl font-normal text-gray-500 border rounded outline-none focus:border-blue-400 focus:shadow">
                        </label>
                    </div>
                    <x-errors name="logo" />
                </div>
            </div>

            <x-textarea name="short_description" label="Short Description" wire:model='short_description' />
        </div>

        <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>
