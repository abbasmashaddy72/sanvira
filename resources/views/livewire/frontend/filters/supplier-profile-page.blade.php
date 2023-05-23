<div>
    <x-frontend.index-container class="py-10">
        <div class="grid grid-cols-12 gap-4">
            <div
                class="flex items-center justify-center col-span-2 p-4 bg-white border-2 border-gray-200 rounded shadow">
                <div class="">
                    <img alt="{{ $profile->company_name }}" class="object-cover h-24 rounded-md w-52"
                        src="{{ asset('storage/' . $profile->logo) }}">
                </div>
            </div>
            <div class="col-span-10 bg-white border-2 border-gray-200 rounded shadow">
                <div class="flex flex-col p-4 lg:flex-row border-slate-200/60 dark:border-darkmode-400">
                    <div class="flex items-center justify-center flex-1 px-5 lg:justify-start">
                        <div class="ml-5">
                            <div class="w-24 text-lg font-medium truncate sm:w-40 sm:whitespace-normal">
                                {{ $profile->company_name }}</div>
                            <div class="text-slate-500">{{ Str::limit($profile->tagline, 40) }}</div>
                            <div class="text-slate-500">
                                <span class="font-semibold text-blue-600">YOE: </span>{{ $profile->doe }}
                            </div>
                            <a href="{{ $profile->website_url }}" class="text-blue-600">Website</a>
                        </div>
                    </div>
                    <div
                        class="flex-1 px-5 pt-5 mt-6 border-t border-l border-r lg:mt-0 border-slate-200/60 dark:border-darkmode-400 lg:border-t-0 lg:pt-0">
                        <div class="font-semibold text-center lg:text-left lg:mt-3">Contact Details</div>
                        <div class="flex flex-col items-center justify-center mt-4 lg:items-start">
                            <div class="flex items-center truncate sm:whitespace-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-blue-600"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-map-pin">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                {{ $profile->company_locality }}
                            </div>
                            <div class="flex items-center mt-3 truncate sm:whitespace-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-blue-600"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-map">
                                    <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                                    <line x1="8" y1="2" x2="8" y2="18"></line>
                                    <line x1="16" y1="6" x2="16" y2="22"></line>
                                </svg>
                                {{ $profile->company_address }}
                            </div>
                            <a href="{{ 'mailto:' . $profile->company_email }}"
                                class="flex items-center mt-3 text-blue-600 truncate sm:whitespace-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-blue-600"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-at-sign">
                                    <circle cx="12" cy="12" r="4"></circle>
                                    <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                </svg>
                                {{ $profile->company_email }}
                            </a>
                            <a href='{{ 'tell:' . $profile->company_number }}'
                                class="flex items-center mt-3 text-blue-600 truncate sm:whitespace-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-blue-600"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-phone">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                    </path>
                                </svg>
                                {{ $profile->company_number }}
                            </a>
                        </div>
                    </div>
                    <div
                        class="flex-1 px-5 pt-5 mt-6 border-l lg:mt-0 border-slate-200/60 dark:border-darkmode-400 lg:pt-0">
                        <div class="font-semibold text-center lg:text-left lg:mt-3">Manager Details</div>
                        <div class="flex flex-col items-center justify-center mt-4 lg:items-start">
                            <div class="flex items-center truncate sm:whitespace-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-blue-600"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                {{ $profile->manager->name }}
                            </div>
                            <a href="{{ 'mailto:' . $profile->manager->email }}"
                                class="flex items-center mt-3 text-blue-600 truncate sm:whitespace-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-blue-600"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-at-sign">
                                    <circle cx="12" cy="12" r="4"></circle>
                                    <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                </svg>
                                {{ $profile->manager->email }}
                            </a>
                            <a href='{{ 'tell:' . $profile->manager->phone }}'
                                class="flex items-center mt-3 text-blue-600 truncate sm:whitespace-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-blue-600"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-phone">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                    </path>
                                </svg>
                                {{ $profile->manager->phone }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 bg-white rounded">
            <ul class="flex items-center justify-start w-full p-2 space-x-2 text-center">
                <li>
                    <button wire:click='showProfile'
                        class="py-2 px-4 font-medium rounded @if ($profileShow) text-blue-600 bg-gray-200 @else text-gray-600 hover:bg-gray-200 hover:text-blue-600 @endif">Profile</button>
                </li>

                <li>
                    <button wire:click='showCertificatesAwards'
                        class="py-2 px-4 font-medium rounded @if ($certificatesAwardsShow) text-blue-600 bg-gray-200 @else text-gray-600 hover:bg-gray-200 hover:text-blue-600 @endif">Certificate
                        / Award</button>
                </li>

                <li>
                    <button wire:click='showProjects'
                        class="py-2 px-4 font-medium rounded @if ($projectsShow) text-blue-600 bg-gray-200 @else text-gray-600 hover:bg-gray-200 hover:text-blue-600 @endif">Projects</button>
                </li>

                <li>
                    <button wire:click='showTeams'
                        class="py-2 px-4 font-medium rounded @if ($teamsShow) text-blue-600 bg-gray-200 @else text-gray-600 hover:bg-gray-200 hover:text-blue-600 @endif">Team
                        Members</button>
                </li>

                <li>
                    <button wire:click='showTestimonials'
                        class="py-2 px-4 font-medium rounded @if ($testimonialsShow) text-blue-600 bg-gray-200 @else text-gray-600 hover:bg-gray-200 hover:text-blue-600 @endif">Testimonials</button>
                </li>

                <li>
                    <button wire:click='showTermsConditions'
                        class="py-2 px-4 font-medium rounded @if ($termsConditionsShow) text-blue-600 bg-gray-200 @else text-gray-600 hover:bg-gray-200 hover:text-blue-600 @endif">Terms
                        & Conditions</button>
                </li>

                <li>
                    <button wire:click='showProducts'
                        class="py-2 px-4 font-medium rounded @if ($productsShow) text-blue-600 bg-gray-200 @else text-gray-600 hover:bg-gray-200 hover:text-blue-600 @endif">Products</button>
                </li>
            </ul>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container class='py-4'>
        <div wire:loading>
            <div class="flex justify-center">
                <svg aria-hidden="true"
                    class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        @if ($profileShow)
            <div class="p-8 bg-white border-2 border-gray-200 rounded shadow">
                <blockquote class="text-xl italic font-semibold text-gray-700 dark:text-white">
                    <svg aria-hidden="true" class="w-10 h-10 text-blue-600 dark:text-gray-600" viewBox="0 0 24 27"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
                            fill="currentColor" />
                    </svg>
                    <p>{{ $profile->tagline }}</p>
                </blockquote>

                <blockquote
                    class="p-4 my-4 border-l-4 border-blue-600 rounded-lg bg-blue-60 dark:border-blue-600 dark:bg-blue-800">
                    <div class="text-gray-900 dark:text-white ck-content">
                        {!! $profile->description !!}
                    </div>
                </blockquote>
            </div>
        @endif

        @if ($certificatesAwardsShow)
            <h5 class="text-xl font-semibold">Certificates & Awards :</h5>

            <div class="grid grid-cols-1 gap-4 pt-6 lg:grid-cols-2">
                <div class="mt-[30px] lg:mt-0">
                    @foreach ($supplier_certificates as $item)
                        <div
                            class="flex items-center p-4 mt-6 transition-all duration-500 ease-in-out bg-white rounded-md shadow hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                            <div class="flex items-center justify-center w-12 h-12 bg-gray-200 rounded-md shadow-lg">
                                @if ($item->type != 'Award')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-600" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="w-16 h-16 p-4 rounded-md shadow bg-slate-50 dark:bg-slate-800 dark:shadow-gray-800">
                                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-600" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="w-16 h-16 p-4 rounded-md shadow bg-slate-50 dark:bg-slate-800 dark:shadow-gray-800">
                                        <circle cx="12" cy="8" r="7"></circle>
                                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                    </svg>
                                @endif
                            </div>
                            <div class="flex-1 ml-4 content">
                                <h4 class="text-lg text-medium">{{ $item->title }}, {{ $item->type }}</h4>
                                <a href="{{ asset('storage/' . $item->attachment) }}" target="__blank"
                                    class="mb-0 text-blue-600">Attachment</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($projectsShow)
            <div class="p-8 bg-white border-2 border-gray-200 rounded shadow">
                <h5 class="text-xl font-semibold">Projects :</h5>

                <div class="mt-3">
                    <ol class="relative border-l border-gray-200 dark:border-gray-700">
                        @foreach ($supplier_projects as $item)
                            <li class="mb-10 ml-4">
                                <div
                                    class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                </div>
                                <time
                                    class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $item->year_range }}</time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $item->name }}
                                    <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                                        {{ $item->city . ', ' . $item->country }}</span>
                                </h3>

                                <blockquote
                                    class="p-4 my-4 border-l-4 border-blue-600 rounded-lg bg-blue-60 dark:border-blue-600 dark:bg-blue-800">
                                    <div class="text-gray-900 dark:text-white ck-content">
                                        {!! $item->description !!}
                                    </div>
                                </blockquote>

                                <blockquote class="text-xl italic font-semibold text-gray-900 dark:text-white">
                                    <svg aria-hidden="true" class="w-10 h-10 text-blue-600 dark:text-gray-600"
                                        viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
                                            fill="currentColor" />
                                    </svg>
                                    <p>{{ $item->feedback }}</p>
                                </blockquote>

                                <div class="flex mt-2 space-x-2">
                                    @foreach ($item->images as $item2)
                                        <a href="{{ asset('storage/' . $item2) }}"
                                            data-lightbox="supplier_projects{{ strtolower(str_replace(' ', '_', $item->name)) }}">
                                            <img class="w-12 h-12 rounded-lg shadow-md"
                                                src='{{ asset('storage/' . $item2) }}' />
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        @endif

        @if ($teamsShow)
            <h5 class="text-xl font-semibold mt-[30px]">Team Members :</h5>

            <div class="grid grid-cols-1 gap-4 mt-4 lg:grid-cols-5 md:grid-cols-2">
                @foreach ($supplier_teams as $item)
                    <div
                        class="relative block overflow-hidden bg-white border-2 border-gray-200 rounded-md shadow group dark:bg-slate-900 dark:shadow-gray-800 hover:border-blue-600 hover:border-2">
                        <div class="block p-4 text-left bg-white dark:bg-slate-900">
                            <img src="{{ asset('storage/' . $item->image) }}"
                                class="object-cover w-full h-32 mx-auto mb-3 rounded-lg shadow-md"
                                alt="{{ $item->name }}">
                            <span
                                class="text-xl font-medium transition-all duration-500 ease-in-out group-hover:text-blue-600 line-clamp-1">{{ $item->name }}
                            </span>
                            <div class="flex justify-between text-blue-600">
                                <div class="text-sm font-medium text-gray-600 transition-all duration-500 ease-in-out">
                                    {{ $item->designation }} Products
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endif

        @if ($testimonialsShow)
            <div class="p-8 bg-white border-2 border-gray-200 rounded shadow">
                <h5 class="text-xl font-semibold">Testimonials :</h5>

                <div class="mt-3">
                    <ol class="relative border-l border-gray-200 dark:border-gray-700">
                        @foreach ($supplier_testimonials as $item)
                            <li class="mb-10 ml-4">
                                <div
                                    class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                </div>
                                <figure class="max-w-screen-md">
                                    <div class="flex items-center mb-4">
                                        @for ($i = 1; $i <= $item->rating; $i++)
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                class="text-yellow-500 fill-current w-7 h-7">
                                                <path
                                                    d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                                </path>
                                            </svg>
                                        @endfor
                                        @for ($i = 1; $i <= 5 - $item->rating; $i++)
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                class="text-gray-400 fill-current w-7 h-7 dark:text-gray-100">
                                                <path
                                                    d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                                </path>
                                            </svg>
                                        @endfor
                                    </div>
                                    <blockquote>
                                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                                            "{{ $item->message }}"</p>
                                    </blockquote>
                                    <figcaption class="flex items-center mt-6 space-x-3">
                                        <div class="flex items-center divide-x-2 divide-gray-300 dark:divide-gray-700">
                                            <cite
                                                class="pr-3 font-medium text-gray-900 dark:text-white">{{ $item->name }}</cite>
                                            <cite
                                                class="pl-3 text-sm text-gray-500 dark:text-gray-400">{{ $item->year }}</cite>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        @endif

        @if ($termsConditionsShow)
            <div class="p-8 bg-white border-2 border-gray-200 rounded shadow">
                <h5 class="text-xl font-semibold">Terms & Conditions :</h5>

                <blockquote
                    class="p-4 my-4 border-l-4 border-blue-600 rounded-lg bg-blue-60 dark:border-blue-600 dark:bg-blue-800">
                    <div class="text-gray-900 dark:text-white ck-content">
                        {!! $profile->terms_conditions !!}
                    </div>
                </blockquote>
            </div>
        @endif

        @if ($productsShow)
            @livewire('frontend.filters.supplier-products', ['profile_id' => $profile->id, 'type' => 'Profile Page', 'page_title' => 'All Products'])
        @endif
    </x-frontend.index-container>
</div>
