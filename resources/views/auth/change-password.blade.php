<x-guest-layout>
    <section class="relative table w-full py-36 lg:py-44">
        <div class="container">
            <div class="flex justify-center">
                <div
                    class="m-auto w-full max-w-[400px] rounded-md bg-white p-6 shadow-md dark:bg-slate-900 dark:shadow-gray-800">

                    <a href="{{ route('homepage') }}">
                        <img src="{{ asset('storage/' . get_static_option('logo')) }}" class="mx-auto h-20" />
                    </a>

                    <x-errors />

                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </div>

                    <h5 class="my-6 text-xl font-semibold">{{ __('Confirm Password') }}</h5>

                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input id="current_password" label="{{ __('Current Password') }}" name="current_password"
                                type="password" class="mt-1 block w-full" autocomplete="current-password" />
                        </div>

                        <div>
                            <x-input id="password" label="{{ __('New Password') }}" name="password" type="password"
                                class="mt-1 block w-full" autocomplete="new-password" />
                        </div>

                        <div>
                            <x-input id="password_confirmation" label="{{ __('Confirm Password') }}"
                                name="password_confirmation" type="password" class="mt-1 block w-full"
                                autocomplete="new-password" />
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="mt-4 flex items-center justify-end">
                                <button type="submit"
                                    class="btn ml-4 rounded-md border-blue-600 bg-blue-600 text-white hover:border-blue-700 hover:bg-blue-700">
                                    {{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
