<div>
    <form wire:submit.prevent="add">
        @if ($type == 'Homepage')
            <div class="grid grid-cols-3 gap-2">
                <x-backend.image-upload :images="$this->logo" :isUploaded="$this->logoIsUploaded" label="Upload Logo" name="logo"
                    model="logo" />

                <x-backend.image-upload :images="$this->footer_logo" :isUploaded="$this->footerLogoIsUploaded" label="Upload Footer Logo" name="footer_logo"
                    model="footer_logo" />

                <x-textarea name="short_description" label="Short Description" wire:model.defer='short_description' />
                <div>
                    <h4 class="card-title my-4 text-2xl font-medium" wire:ignore>
                        {{ __('Social Media Links') }}
                    </h4>
                    <x-input name="twitter" label="Twitter" type="text" wire:model.defer='twitter' />

                    <x-input name="facebook" label="Facebook" type="text" wire:model.defer='facebook' />

                    <x-input name="instagram" label="Instagram" type="text" wire:model.defer='instagram' />

                    <x-input name="linkedin" label="Linkedin" type="text" wire:model.defer='linkedin' />

                    <x-input name="youtube" label="Youtube" type="text" wire:model.defer='youtube' />

                    <x-input name="google_business" label="Google Business" type="text"
                        wire:model.defer='google_business' />
                </div>

                <div>
                    <h4 class="card-title my-4 text-2xl font-medium" wire:ignore>
                        {{ __('Google Map') }}
                    </h4>

                    <x-input name="embed_map_link"
                        label="Embed Map Link(Directly from Google Maps Search, Share, Embed copy src link & paste)"
                        type="text" wire:model.defer='embed_map_link' required />

                </div>
            </div>
        @endif

        @if ($type == 'Privacy Policy')
            <div>
                <x-backend.ckEditor idPrefix="body1en" lang="EN" name="privacy_policy" label="Privacy Policy"
                    wire:model.defer='privacy_policy' />
            </div>
        @endif
        @if ($type == 'Terms of Use')
            <div>
                <x-backend.ckEditor idPrefix="body2en" lang="EN" name="terms_of_use" label="Terms of Use"
                    wire:model.defer='terms_of_use' />
            </div>
        @endif
        @if ($type == 'Return Refund')
            <div>
                <x-backend.ckEditor idPrefix="body2en" lang="EN" name="return_refunds" label="Returns & Refunds"
                    wire:model.defer='return_refunds' />
            </div>
        @endif
        @if ($type == 'Career')
            <div>
                <x-backend.ckEditor idPrefix="body2en" lang="EN" name="career" label="Career"
                    wire:model.defer='career' />
            </div>
        @endif

        <button class="btn btn-primary mt-4" type="submit">Save</button>
    </form>
</div>
