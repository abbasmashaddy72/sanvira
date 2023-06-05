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
                    <p class="mt-3 text-slate-400">The phrasal sequence of the is now so that many campaign and
                        benefit</p>

                    <div class="mt-5">
                        <a href="tel:+152534-468-854"
                            class="btn btn-link text-blue-600 duration-500 ease-in-out after:bg-blue-600 hover:text-blue-600">+152
                            534-468-854</a>
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
                    <p class="mt-3 text-slate-400">The phrasal sequence of the is now so that many campaign and
                        benefit</p>

                    <div class="mt-5">
                        <a href="mailto:contact@example.com"
                            class="btn btn-link text-blue-600 duration-500 ease-in-out after:bg-blue-600 hover:text-blue-600">contact@example.com</a>
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
                    <p class="mt-3 text-slate-400">C/54 Northwest Freeway, Suite 558, <br> Houston, USA 485</p>

                    <div class="mt-5">
                        <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                            data-type="iframe"
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
