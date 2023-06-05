<x-guest-layout>
    <section class="relative table w-full py-36 lg:py-44">

        <div class="container">
            <div class="flex justify-center">
                <div
                    class="m-auto w-full max-w-[400px] rounded-md bg-white p-6 shadow-md dark:bg-slate-900 dark:shadow-gray-800">

                    <a href="{{ route('homepage') }}">
                        <img src="{{ asset('storage/' . get_static_option('logo')) }}" class="mx-auto h-20" />
                    </a>

                    <h5 class="my-6 text-xl font-semibold">{{ __('Reset Password') }}</h5>

                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif

                    <form class="text-left" method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div class="mt-4 flex items-center justify-end">
                            <button type="submit"
                                class="btn ml-4 rounded-md border-blue-600 bg-blue-600 text-white hover:border-blue-700 hover:bg-blue-700">
                                {{ __('Resend Verification Email') }}</button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
