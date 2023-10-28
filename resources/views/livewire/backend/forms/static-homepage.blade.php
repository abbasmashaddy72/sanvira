<div>
    @push('styles')
        <style>
            .ck-content>blockquote,
            .ck-content>dl,
            .ck-content>dd,
            .ck-content>h1,
            .ck-content>h2,
            .ck-content>h3,
            .ck-content>h4,
            .ck-content>h5,
            .ck-content>h6,
            .ck-content>hr,
            .ck-content>figure,
            .ck-content>p,
            .ck-content>pre {
                margin: revert;
            }

            .ck-content>ol,
            .ck-content>ul {
                list-style: revert;
                margin: revert;
                padding: revert;
            }

            .ck-content>table {
                border-collapse: revert;
            }

            .ck-content>h1,
            .ck-content>h2,
            .ck-content>h3,
            .ck-content>h4,
            .ck-content>h5,
            .ck-content>h6 {
                font-size: revert;
                font-weight: revert;
            }

            .ck-editor__editable_inline {
                min-height: 200px;
            }
        </style>
    @endpush

    <form wire:submit="add">
        @if ($type == 'Homepage')
            <div class="grid grid-cols-3 gap-2">
                <x-backend.image-upload :images="$this->logo" :isUploaded="$this->logoIsUploaded" label="{{ __('Upload Logo') }}" name="logo"
                    model="logo" />

                <x-backend.image-upload :images="$this->footer_logo" :isUploaded="$this->footerLogoIsUploaded" label="{{ __('Upload Footer Logo') }}"
                    name="footer_logo" model="footer_logo" />

                <x-textarea name="short_description" label="{{ __('Short Description') }}"
                    wire:model='short_description' />
                <div>
                    <h4 class="card-title my-4 text-2xl font-medium" wire:ignore>
                        {{ __('Social Media Links') }}
                    </h4>
                    <x-input name="twitter" label="{{ __('Twitter') }}" type="text" wire:model='twitter' />

                    <x-input name="facebook" label="{{ __('Facebook') }}" type="text" wire:model='facebook' />

                    <x-input name="instagram" label="{{ __('Instagram') }}" type="text"
                        wire:model='instagram' />

                    <x-input name="linkedin" label="{{ __('Linkedin') }}" type="text" wire:model='linkedin' />

                    <x-input name="youtube" label="{{ __('Youtube') }}" type="text" wire:model='youtube' />

                    <x-input name="google_business" label="{{ __('Google Business') }}" type="text"
                        wire:model='google_business' />
                </div>

                <div>
                    <h4 class="card-title my-4 text-2xl font-medium" wire:ignore>
                        {{ __('Google Map') }}
                    </h4>

                    <x-input name="embed_map_link"
                        label="{{ __('Embed Map Link(Directly from Google Maps Search, Share, Embed copy src link & paste)') }}"
                        type="text" wire:model='embed_map_link' required />

                </div>
            </div>
        @endif

        @if ($type == 'Privacy Policy')
            <div>
                <x-backend.ckEditor idPrefix="body1en" lang="EN" name="privacy_policy"
                    label="{{ __('Privacy Policy') }}" wire:model='privacy_policy' />
            </div>
        @endif
        @if ($type == 'Terms of Use')
            <div>
                <x-backend.ckEditor idPrefix="body2en" lang="EN" name="terms_of_use"
                    label="{{ __('Terms of Use') }}" wire:model='terms_of_use' />
            </div>
        @endif
        @if ($type == 'Return Refund')
            <div>
                <x-backend.ckEditor idPrefix="body2en" lang="EN" name="return_refunds"
                    label="{{ __('Returns & Refunds') }}" wire:model='return_refunds' />
            </div>
        @endif

        <button class="btn btn-primary mt-4" type="submit">Save</button>
    </form>
</div>
