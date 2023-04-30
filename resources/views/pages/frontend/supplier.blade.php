<x-guest-layout>
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
    <section class="relative pb-16 lg:pb-24">
        @livewire('frontend.filters.supplier-profile-page', ['profile' => $profile])
    </section>
</x-guest-layout>
