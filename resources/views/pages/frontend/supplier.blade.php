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
    <section class="relative pt-20 pb-16 lg:pb-24">
        <div class="container-fluid">
            <div class="relative text-transparent profile-banner">
                <div class="relative shrink-0">
                    <div class="w-full leading-[0] border-0">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                            style="border:0" class="w-full h-80" allowfullscreen></iframe>
                    </div>
                    {{-- <img src="assets/images/blog/bg.jpg" class="object-cover w-full h-80" alt=""> --}}
                    {{-- <div class="absolute inset-0 bg-black/70"></div>
                    <label class="absolute inset-0 cursor-pointer" for="pro-banner"></label> --}}
                </div>
            </div>
        </div>
        <!--end container-->

        @livewire('frontend.filters.supplier-profile-page', ['profile' => $profile])

        <!--end container-->
    </section>
</x-guest-layout>
