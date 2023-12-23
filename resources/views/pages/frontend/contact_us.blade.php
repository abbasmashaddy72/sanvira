<x-guest-layout>
    <x-frontend.index-container class="bg-white py-36 lg:py-44 lg:pb-8">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <div class="mt-6 px-6 text-center">
                <div wire:ignore
                    class="mx-auto flex h-20 w-20 items-center justify-center rounded-xl bg-blue-600/5 align-middle text-3xl text-blue-600 shadow-sm dark:shadow-gray-800">
                    <i class="ri-phone-line"></i>
                </div>

                <div class="content mt-7">
                    <h5 class="title h5 text-xl font-medium">{{ __('Phone') }}</h5>
                    <p class="mt-3 text-slate-400"></p>

                    <div class="mt-5">
                        <a href="tel:{{ get_static_option('contant_no') }}"
                            class="btn btn-link text-blue-600 duration-500 ease-in-out after:bg-blue-600 hover:text-blue-600">{{ get_static_option('contant_no') }}</a>
                    </div>
                </div>
            </div>

            <div class="mt-6 px-6 text-center">
                <div wire:ignore
                    class="mx-auto flex h-20 w-20 items-center justify-center rounded-xl bg-blue-600/5 align-middle text-3xl text-blue-600 shadow-sm dark:shadow-gray-800">
                    <i class="ri-mail-line"></i>
                </div>

                <div class="content mt-7">
                    <h5 class="title h5 text-xl font-medium">{{ __('Email') }}</h5>
                    <p class="mt-3 text-slate-400"></p>

                    <div class="mt-5">
                        <a href="mailto:{{ get_static_option('email') }}"
                            class="btn btn-link text-blue-600 duration-500 ease-in-out after:bg-blue-600 hover:text-blue-600">{{ get_static_option('email') }}</a>
                    </div>
                </div>
            </div>

            <div class="mt-6 px-6 text-center">
                <div wire:ignore
                    class="mx-auto flex h-20 w-20 items-center justify-center rounded-xl bg-blue-600/5 align-middle text-3xl text-blue-600 shadow-sm dark:shadow-gray-800">
                    <i class="ri-map-pin-line"></i>
                </div>

                <div class="content mt-7">
                    <h5 class="title h5 text-xl font-medium">{{ __('Location') }}</h5>

                    <div class="mt-5">
                        <a href="{{ get_static_option('google_map_link') }}" target="_blank" data-type="iframe"
                            class="video-play-icon read-more lightbox btn btn-link text-blue-600 duration-500 ease-in-out after:bg-blue-600 hover:text-blue-600">{{ __('View on Google map') }}</a>
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
