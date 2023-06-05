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

                    <h5 class="my-6 text-xl font-semibold">{{ __('Reset Password') }}</h5>

                    <form class="text-left" method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="grid grid-cols-1">
                            <div class="mb-4">
                                <x-input label="{{ __('Email') }}" name="email" placeholder="name@example.com"
                                    type="email" required />
                            </div>

                            <div class="mb-4">
                                <x-inputs.password label="{{ __('Password') }}" name="password" required />
                            </div>

                            <div class="mb-4">
                                <x-inputs.password label="{{ __('Confirm Password') }}" name="password_confirmation"
                                    required />
                            </div>

                            <div class="mt-4 flex items-center justify-end">
                                <button type="submit"
                                    class="btn ml-4 rounded-md border-blue-600 bg-blue-600 text-white hover:border-blue-700 hover:bg-blue-700">
                                    {{ __('Reset Password') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
