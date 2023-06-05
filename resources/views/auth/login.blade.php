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

                    <h5 class="my-6 text-xl font-semibold">{{ __('Login') }}</h5>

                    <form class="text-left" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="grid grid-cols-1">
                            <div class="mb-4">
                                <x-input label="{{ __('Email') }}" name="email" placeholder="name@example.com"
                                    type="email" required autofocus autocomplete="on" />
                            </div>

                            <div class="mb-4">
                                <x-inputs.password label="{{ __('Password') }}" name="password"
                                    autocomplete="current-password" required />
                            </div>

                            <div class="mb-4 flex justify-between">
                                <x-checkbox id="remember_me" label="{{ __('Remember me') }}" name="remember" />

                                <p class="mb-0 text-slate-400">
                                    <a href="{{ route('password.request') }}" class="text-slate-400">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                </p>
                            </div>

                            <div class="mb-4">
                                <button type="submit"
                                    class="btn w-full rounded-md border-blue-600 bg-blue-600 text-white hover:border-blue-700 hover:bg-blue-700">
                                    {{ __('Log In / Sign In') }}</button>
                            </div>

                            <div class="text-center">
                                <span class="me-2 text-slate-400">{{ __("Don't have an account ?") }}</span> <a
                                    href="{{ route('register') }}"
                                    class="font-bold text-black dark:text-white">{{ __('Sign Up') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
