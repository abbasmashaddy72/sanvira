<div class="fixed inset-x-0 bottom-0 pb-2 js-cookie-consent cookie-consent">
    <div class="px-6 mx-auto max-w-7xl">
        <div class="p-2 bg-yellow-100 rounded-lg">
            <div class="flex flex-wrap items-center justify-between">
                <div class="items-center flex-1 hidden w-0 md:inline">
                    <p class="ml-3 text-black cookie-consent__message">
                        {!! trans('cookie-consent::texts.message') !!}
                    </p>
                </div>
                <div class="flex-shrink-0 w-full mt-2 sm:mt-0 sm:w-auto">
                    <button
                        class="flex items-center justify-center px-4 py-2 text-sm font-medium text-yellow-800 bg-yellow-400 rounded-md cursor-pointer js-cookie-consent-agree cookie-consent__agree hover:bg-yellow-300">
                        {{ trans('cookie-consent::texts.agree') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
