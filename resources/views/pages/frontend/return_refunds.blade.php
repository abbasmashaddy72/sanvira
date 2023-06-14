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
    <x-slot name='topSection'>
        <section
            class="relative table w-full bg-[url('../../assets/images/company/aboutus.jpg')] bg-cover bg-center bg-no-repeat py-28">
            <div class="absolute inset-0 bg-black opacity-75"></div>
            <div class="container">
                <div class="mt-10 grid grid-cols-1 pb-8 text-center">
                    <div class="mb-2 inline-flex justify-center">
                        @foreach (range(1, 5) as $i)
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                class="h-7 w-7 fill-current text-yellow-400">
                                <path
                                    d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                </path>
                            </svg>
                        @endforeach
                    </div>
                    <h3 class="mb-6 text-3xl font-medium leading-normal text-white md:text-4xl md:leading-normal">Scale
                        Your Business though Marketplace!</h3>
                </div>
                <div class="mx-auto flex justify-center space-x-10">
                    <a href="{{ route('register') }}"
                        class="mt-4 flex justify-center rounded bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700">
                        Get Started</a>

                    <a href="{{ route('contact_us') }}"
                        class="mt-4 flex justify-center rounded bg-gray-600 px-4 py-2 font-medium text-white hover:bg-gray-700">
                        Contact Us</a>
                </div>
            </div>
        </section>
        <div class="relative">
            <div
                class="shape z-1 absolute -bottom-[2px] end-0 start-0 overflow-hidden text-white dark:text-slate-900 sm:-bottom-px">
                <svg class="h-auto w-full" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
    </x-slot>
    <x-frontend.index-container class="bg-white py-14">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-6 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">Returns & Refunds</h3>
        </div>

        <div class="px-3">
            <blockquote
                class="bg-blue-60 rounded-lg border-l-4 border-blue-600 pl-4 dark:border-blue-600 dark:bg-blue-800">
                <div class="ck-content text-gray-900 dark:text-white">
                    {!! get_static_option('return_refunds') !!}
                </div>
            </blockquote>
        </div>
    </x-frontend.index-container>
</x-guest-layout>
