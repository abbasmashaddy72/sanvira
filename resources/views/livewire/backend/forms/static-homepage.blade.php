<div>
    <form wire:submit.prevent="add">
        <div class="grid grid-cols-3 gap-2">
            <div>
                @if ($this->footer_logo)
                    <div class="my-4">
                        <div class="mb-2">
                            <label class="block">
                                <x-label label="Uploaded Footer Logo Preview" />
                                <img src="{{ $this->homeImageIsUploaded ? $this->footer_logo->temporaryUrl() : url('storage/' . $this->footer_logo) }}"
                                    class="mt-2" width="250" height="300">
                            </label>
                        </div>
                    </div>
                @endif

                <div class="my-4">
                    <div class="mb-2">
                        <label class="block">
                            <x-label label="Footer Logo" />
                            <input type="file" accept="image/*" wire:model="footer_logo"
                                class="block w-full mt-2 text-xl font-normal text-gray-500 border rounded outline-none focus:border-blue-400 focus:shadow">
                        </label>
                    </div>
                    <x-errors name="footer_logo" />
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
            <div>
                <h4 class="my-4 text-2xl font-medium card-title" wire:ignore>
                    {{ __('Social Media Links') }}
                </h4>

                <x-input name="twitter" label="Twitter" type="text" wire:model='twitter' />

                <x-input name="facebook" label="Facebook" type="text" wire:model='facebook' />

                <x-input name="instagram" label="Instagram" type="text" wire:model='instagram' />

                <x-input name="linkedin" label="Linkedin" type="text" wire:model='linkedin' />

                <x-input name="youtube" label="Youtube" type="text" wire:model='youtube' />

                <x-input name="google_business" label="Google Business" type="text" wire:model='google_business' />
            </div>

            <div>
                <h4 class="my-4 text-2xl font-medium card-title" wire:ignore>
                    {{ __('Google Map') }}
                </h4>

                <x-input name="embed_map_link"
                    label="Embed Map Link(Directly from Google Maps Search, Share, Embed copy src link & paste)"
                    type="text" wire:model='embed_map_link' />

            </div>
        </div>

        <div>
            <x-backend.ckEditor id="body1en" lang="EN" name="privacy_policy" label="Privacy Policy"
                wire:model='privacy_policy' />
        </div>
        <div>
            <x-backend.ckEditor id="body2en" lang="EN" name="terms_conditions" label="Terms & Conditions"
                wire:model='terms_conditions' />
        </div>

        <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>
