<x-guest-layout>
    <x-frontend.index-container class="bg-white py-8">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <div class="mt-6 px-6 text-center">
                <div
                    class="mx-auto flex h-20 w-20 items-center justify-center rounded-xl bg-blue-600/5 align-middle text-3xl text-blue-600 shadow-sm dark:shadow-gray-800">
                    <i class="uil uil-phone"></i>
                </div>

                <div class="content mt-7">
                    <h5 class="title h5 text-xl font-medium">Phone</h5>
                    <p class="mt-3 text-slate-400"></p>

                    <div class="mt-5">
                        <a href="tel:+9714-263-80-25"
                            class="btn btn-link text-blue-600 duration-500 ease-in-out after:bg-blue-600 hover:text-blue-600">+9714-263-80-25</a>
                    </div>
                </div>
            </div>

            <div class="mt-6 px-6 text-center">
                <div
                    class="mx-auto flex h-20 w-20 items-center justify-center rounded-xl bg-blue-600/5 align-middle text-3xl text-blue-600 shadow-sm dark:shadow-gray-800">
                    <i class="uil uil-envelope"></i>
                </div>

                <div class="content mt-7">
                    <h5 class="title h5 text-xl font-medium">Email</h5>
                    <p class="mt-3 text-slate-400"></p>

                    <div class="mt-5">
                        <a href="mailto:info@kasperpro.com"
                            class="btn btn-link text-blue-600 duration-500 ease-in-out after:bg-blue-600 hover:text-blue-600">info@kasperpro.com</a>
                    </div>
                </div>
            </div>

            <div class="mt-6 px-6 text-center">
                <div
                    class="mx-auto flex h-20 w-20 items-center justify-center rounded-xl bg-blue-600/5 align-middle text-3xl text-blue-600 shadow-sm dark:shadow-gray-800">
                    <i class="uil uil-map-marker"></i>
                </div>

                <div class="content mt-7">
                    <h5 class="title h5 text-xl font-medium">Location</h5>
                    <p class="mt-3 text-slate-400">in5 Tech, King Salman Bin Abdulaziz<br>Al Saud St - Al Sufouh 2 -
                        Dubai</p>

                    <div class="mt-5">
                        <a href="https://goo.gl/maps/AnbPNS5NL1X4uhBK6" target="_blank" data-type="iframe"
                            class="video-play-icon read-more lightbox btn btn-link text-blue-600 duration-500 ease-in-out after:bg-blue-600 hover:text-blue-600">View
                            on Google map</a>
                    </div>
                </div>
            </div>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container>
        <div class="grid grid-cols-1 items-center gap-4 md:grid-cols-12">
            <div class="md:col-span-6 lg:col-span-7">
                <img src="assets/images/contact.svg" alt="">
            </div>

            @livewire('frontend.form.contact-us')
        </div>
    </x-frontend.index-container>
</x-guest-layout>
