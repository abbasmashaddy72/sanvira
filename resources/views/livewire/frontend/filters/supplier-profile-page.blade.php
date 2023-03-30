<div class="container mt-16 lg:mt-24">
    <div class="md:flex">
        <div class="lg:w-1/4 md:w-1/3 md:px-3">
            <div class="relative -mt-32 md:-mt-48">
                <div class="p-6 bg-white rounded-md shadow dark:shadow-gray-800 dark:bg-slate-900">
                    <div class="mb-5 text-center profile-pic">
                        <div>
                            <div class="relative mx-auto h-28 w-28">
                                <img src="{{ asset('storage/' . $profile->logo) }}"
                                    class="rounded-full shadow dark:shadow-gray-800 ring-4 ring-slate-50 dark:ring-slate-800"
                                    alt="">
                                <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                            </div>

                            <div class="mt-4">
                                <h5 class="text-lg font-semibold">{{ $profile->company_name }}</h5>
                                <p class="text-slate-400">{{ $profile->company_email }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 dark:border-gray-700">
                        <ul class="mt-3 mb-0 list-none sidebar-nav" id="navmenu-nav">
                            <li class="navbar-item account-menu">
                                <button wire:click='showProfile'
                                    class="flex items-center py-2 rounded navbar-link text-slate-400">
                                    <span class="mr-2 text-[18px] mb-0"><i class="uil uil-dashboard"></i></span>
                                    <h6 class="mb-0 font-semibold">Profile</h6>
                                </button>
                            </li>

                            <li class="navbar-item account-menu">
                                <button wire:click='showCertificatesAwards'
                                    class="flex items-center py-2 rounded navbar-link text-slate-400">
                                    <span class="mr-2 text-[18px] mb-0"><i class="uil uil-diary-alt"></i></span>
                                    <h6 class="mb-0 font-semibold">Certificate / Award</h6>
                                </button>
                            </li>

                            <li class="navbar-item account-menu">
                                <button wire:click='showProjects'
                                    class="flex items-center py-2 rounded navbar-link text-slate-400">
                                    <span class="mr-2 text-[18px] mb-0"><i class="uil uil-credit-card"></i></span>
                                    <h6 class="mb-0 font-semibold">Projects</h6>
                                </button>
                            </li>

                            <li class="navbar-item account-menu">
                                <button wire:click='showTeams'
                                    class="flex items-center py-2 rounded navbar-link text-slate-400">
                                    <span class="mr-2 text-[18px] mb-0"><i class="uil uil-receipt"></i></span>
                                    <h6 class="mb-0 font-semibold">Team Members</h6>
                                </button>
                            </li>

                            <li class="navbar-item account-menu">
                                <button wire:click='showTestimonials'
                                    class="flex items-center py-2 rounded navbar-link text-slate-400">
                                    <span class="mr-2 text-[18px] mb-0"><i class="uil uil-process"></i></span>
                                    <h6 class="mb-0 font-semibold">Testimonials</h6>
                                </button>
                            </li>

                            <li class="navbar-item account-menu">
                                <button wire:click='showTermsConditions'
                                    class="flex items-center py-2 rounded navbar-link text-slate-400">
                                    <span class="mr-2 text-[18px] mb-0"><i class="uil uil-bell"></i></span>
                                    <h6 class="mb-0 font-semibold">Terms & Conditions</h6>
                                </button>
                            </li>

                            <li class="navbar-item account-menu">
                                <button wire:click.prefetch='showProducts'
                                    class="flex items-center py-2 rounded navbar-link text-slate-400">
                                    <span class="mr-2 text-[18px] mb-0"><i class="uil uil-setting"></i></span>
                                    <h6 class="mb-0 font-semibold">Products</h6>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-[30px] md:mt-0">
            @if ($profileShow)
                <div class="pb-6 border-b border-gray-100 dark:border-gray-700">
                    <h5 class="text-xl font-semibold">{{ $profile->tagline }}</h5>

                    <div class="mt-3 text-slate-600 dark:text-slate-300 ck-content">{!! $profile->description !!}</div>
                </div>

                <div class="grid lg:grid-cols-2 grid-cols-1 gap-[30px] pt-6">
                    <div>
                        <h5 class="text-xl font-semibold">Company Details :</h5>
                        <div class="mt-6">
                            <div class="flex items-center">
                                <i data-feather="mail" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                <div class="flex-1">
                                    <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Email :</h6>
                                    <a href="{{ 'mailto:' . $profile->company_email }}"
                                        class="text-slate-400">{{ $profile->company_email }}</a>
                                </div>
                            </div>
                            <div class="flex items-center mt-3">
                                <i data-feather="map-pin" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                <div class="flex-1">
                                    <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Locality :</h6>
                                    <p class="text-slate-400">{{ $profile->company_locality }}</p>
                                </div>
                            </div>
                            <div class="flex items-center mt-3">
                                <i data-feather="italic" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                <div class="flex-1">
                                    <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Address :</h6>
                                    <p class="text-slate-400">{{ $profile->company_address }}</p>
                                </div>
                            </div>
                            <div class="flex items-center mt-3">
                                <i data-feather="globe" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                <div class="flex-1">
                                    <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Website :</h6>
                                    <a href="{{ $profile->website_url }}" target="__blank"
                                        class="text-slate-400">{{ $profile->website_url }}</a>
                                </div>
                            </div>
                            <div class="flex items-center mt-3">
                                <i data-feather="gift" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                <div class="flex-1">
                                    <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Year of Establishment :
                                    </h6>
                                    <p class="mb-0 text-slate-400">{{ $profile->yoe }}</p>
                                </div>
                            </div>
                            <div class="flex items-center mt-3">
                                <i data-feather="phone" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                <div class="flex-1">
                                    <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Contact No. :</h6>
                                    <a href="" class="text-slate-400">{{ $profile->company_number }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-[30px] lg:mt-0">
                        <h5 class="text-xl font-semibold">Manager Details :</h5>
                        <div class="mt-6">
                            <div class="flex items-center mt-3">
                                <i data-feather="globe" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                <div class="flex-1">
                                    <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Name :</h6>
                                    <p class="text-slate-400">{{ $profile->contact_person_name }}</p>
                                </div>
                            </div>
                            <div class="flex items-center mt-3">
                                <i data-feather="gift" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                <div class="flex-1">
                                    <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Email :
                                    </h6>
                                    <a href="{{ 'mailto:' . $profile->contact_person_email }}"
                                        class="mb-0 text-slate-400">{{ $profile->contact_person_email }}</a>
                                </div>
                            </div>
                            <div class="flex items-center mt-3">
                                <i data-feather="phone" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                <div class="flex-1">
                                    <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Contact No. :</h6>
                                    <a href="{{ 'tel:' . $profile->contact_person_number }}"
                                        class="text-slate-400">{{ $profile->contact_person_number }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($certificatesAwardsShow)
                <h5 class="text-xl font-semibold mt-[30px]">Certificates & Awards :</h5>

                <div class="grid lg:grid-cols-2 grid-cols-1 gap-[30px] pt-6">
                    <div class="mt-[30px] lg:mt-0">
                        @foreach ($supplier_certificates as $item)
                            <div
                                class="flex items-center p-4 mt-6 transition-all duration-500 ease-in-out bg-white rounded-md shadow hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                                <img src="assets/images/client/circle-logo.png"
                                    class="w-16 h-16 p-4 rounded-md shadow bg-slate-50 dark:bg-slate-800 dark:shadow-gray-800"
                                    alt="">
                                <div class="flex-1 ml-4 content">
                                    <h4 class="text-lg text-medium">{{ $item->title }}</h4>
                                    <a href="{{ asset('storage/' . $item->attachment) }}"
                                        class="mb-0 text-slate-400">Attachment</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($projectsShow)
                <h5 class="text-xl font-semibold mt-[30px]">Projects :</h5>

                <div class="mt-3">
                    <ol class="relative border-l border-gray-200 dark:border-gray-700">
                        @foreach ($supplier_projects as $item)
                            <li class="mb-10 ml-4">
                                <div
                                    class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                </div>
                                <time
                                    class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $item->year_range }}</time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $item->name }}
                                    <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                                        {{ $item->city . ', ' . $item->country }}</span>
                                </h3>
                                <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">
                                    {!! $item->description !!}</p>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="inline-block pr-2 h-7 w-7" viewBox="0 0 24 24">
                                        <path
                                            d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z" />
                                    </svg>
                                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                        {{ $item->feedback }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endif

            @if ($teamsShow)
                <h5 class="text-xl font-semibold mt-[30px]">Team Members :</h5>

                <div class="grid lg:grid-cols-3 mt-4 md:grid-cols-2 grid-cols-1 gap-[30px]">
                    @foreach ($supplier_teams as $item)
                        <div
                            class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                            <div class="relative">
                                <img class="h-32" src="{{ asset('storage/' . $item->image) }}" alt="">
                            </div>

                            <div class="p-6">
                                <p class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">
                                    {{ $item->name }}</p>
                                <p class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">
                                    {{ $item->designation }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif

            @if ($testimonialsShow)
                <h5 class="text-xl font-semibold mt-[30px]">Testimonials :</h5>

                <div class="mt-3">
                    <ol class="relative border-l border-gray-200 dark:border-gray-700">
                        @foreach ($supplier_testimonials as $item)
                            <li class="mb-10 ml-4">
                                <div
                                    class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                </div>
                                <time
                                    class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $item->year }}</time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $item->name }}
                                </h3>
                                <div class="flex items-center pb-4 text-sm text-gray-600">
                                    @for ($i = 1; $i <= $item->rating; $i++)
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 text-yellow-500 fill-current">
                                            <path
                                                d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                            </path>
                                        </svg>
                                    @endfor
                                    @for ($i = 1; $i <= 5 - $item->rating; $i++)
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 text-gray-400 fill-current dark:text-gray-100">
                                            <path
                                                d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                            </path>
                                        </svg>
                                    @endfor
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="inline-block pr-2 h-7 w-7" viewBox="0 0 24 24">
                                        <path
                                            d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z" />
                                    </svg>
                                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                        {{ $item->message }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endif

            @if ($termsConditionsShow)
                <h5 class="text-xl font-semibold mt-[30px]">Terms & Conditions :</h5>

                <div class="mt-3 text-slate-600 dark:text-slate-300 ck-content">{!! $profile->terms_conditions !!}</div>
            @endif

            @if ($productsShow)
                <h5 class="text-xl font-semibold mt-[30px]">Products :</h5>

                <div class="grid lg:grid-cols-2 mt-4 md:grid-cols-2 grid-cols-1 gap-[30px]">
                    @foreach ($supplier_products as $item)
                        <div
                            class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                            <div class="relative">
                                <img class="h-32" src="{{ asset($item->image) }}" alt="">
                            </div>

                            <div class="p-6">
                                <div class="pb-6">
                                    <a href="{{ route('products_details', ['data' => $item->id]) }}"
                                        class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">{{ $item->name }}</a>
                                </div>

                                <ul
                                    class="grid items-center grid-cols-1 gap-2 py-6 list-none border-gray-100 border-y dark:border-gray-800">
                                    <li class="flex items-center justify-between">
                                        <span
                                            class="mr-2 font-semibold text-indigo-600">{{ __('Min Max Order Quantity:') }}</span>
                                        <span class="ml-2">{{ $item->min_max_oq }}</span>
                                    </li>

                                    <li class="flex items-center justify-between">
                                        <span
                                            class="mr-2 font-semibold text-indigo-600">{{ __('Estimate Delivery Time in Days:') }}</span>
                                        <span class="ml-2">{{ $item->edt }}</span>
                                    </li>

                                    <li class="flex items-center justify-between">
                                        <span
                                            class="mr-2 font-semibold text-indigo-600">{{ __('Brand Name:') }}</span>
                                        <span class="ml-2">{{ $item->brand }}</span>
                                    </li>

                                    <li class="flex items-center justify-between">
                                        <span
                                            class="mr-2 font-semibold text-indigo-600">{{ __('Manufacturer Name:') }}</span>
                                        <span class="ml-2">{{ $item->manufacturer }}</span>
                                    </li>

                                    <li class="flex items-center justify-between">
                                        <span
                                            class="mr-2 font-semibold text-indigo-600">{{ __('Model Name:') }}</span>
                                        <span class="ml-2">{{ $item->model }}</span>
                                    </li>
                                </ul>

                                <ul class="flex items-center justify-between pt-6 list-none">
                                    <li>
                                        <button class="text-lg font-medium">
                                            Add to RFQ
                                        </button>
                                    </li>

                                    <li>
                                        <button class="text-lg font-medium">
                                            Add to Cart
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="mt-8">
                    {{ $supplier_products->links() }}
                </div>
            @endif
        </div>

    </div>
    <!--end grid-->
</div>
