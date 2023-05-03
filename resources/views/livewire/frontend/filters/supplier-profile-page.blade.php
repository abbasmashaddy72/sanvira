<div>
    <x-frontend.index-container>
        <div class="relative px-5 bg-white rounded-lg shadow-lg">
            <div class="flex flex-col pb-5 -mx-5 border-b lg:flex-row border-slate-200/60 dark:border-darkmode-400">
                <div class="flex items-center justify-center flex-1 px-5 lg:justify-start">
                    <div class="relative flex-none">
                        <img alt="{{ $profile->company_name }}"
                            class="object-cover w-20 h-20 rounded-md sm:w-24 sm:h-24 lg:w-32 lg:h-32"
                            src="{{ asset('storage/' . $profile->logo) }}">
                    </div>
                    <div class="ml-5">
                        <div class="w-24 text-lg font-medium truncate sm:w-40 sm:whitespace-normal">
                            {{ $profile->company_name }}</div>
                        <div class="text-slate-500">{{ Str::limit($profile->tagline, 40) }}</div>
                        <div class="text-slate-500">
                            <span class="font-semibold text-indigo-600">YOE: </span>{{ $profile->yoe }}
                        </div>
                        <a href="{{ $profile->website_url }}" class="text-indigo-600">Website</a>
                    </div>
                </div>
                <div
                    class="flex-1 px-5 pt-5 mt-6 border-t border-l border-r lg:mt-0 border-slate-200/60 dark:border-darkmode-400 lg:border-t-0 lg:pt-0">
                    <div class="font-semibold text-center lg:text-left lg:mt-3">Contact Details</div>
                    <div class="flex flex-col items-center justify-center mt-4 lg:items-start">
                        <div class="flex items-center truncate sm:whitespace-normal">
                            <i data-feather="map-pin" class="w-4 h-4 mr-2 text-slate-500"></i>
                            {{ $profile->company_locality }}
                        </div>
                        <div class="flex items-center mt-3 truncate sm:whitespace-normal">
                            <i data-feather="map" class="w-4 h-4 mr-2 text-slate-500"></i>
                            {{ $profile->company_address }}
                        </div>
                        <a href="{{ 'mailto:' . $profile->company_email }}"
                            class="flex items-center mt-3 text-indigo-600 truncate sm:whitespace-normal">
                            <i data-feather="at-sign" class="w-4 h-4 mr-2 text-slate-500"></i>
                            {{ $profile->company_email }}
                        </a>
                        <a href='{{ 'tell:' . $profile->company_number }}'
                            class="flex items-center mt-3 text-indigo-600 truncate sm:whitespace-normal">
                            <i data-feather="phone" class="w-4 h-4 mr-2 text-slate-500"></i>
                            {{ $profile->company_number }}
                        </a>
                    </div>
                </div>
                <div
                    class="flex-1 px-5 pt-5 mt-6 border-t border-l border-r lg:mt-0 border-slate-200/60 dark:border-darkmode-400 lg:border-t-0 lg:pt-0">
                    <div class="font-semibold text-center lg:text-left lg:mt-3">Manager Details</div>
                    <div class="flex flex-col items-center justify-center mt-4 lg:items-start">
                        <div class="flex items-center truncate sm:whitespace-normal">
                            <i data-feather="user" class="w-4 h-4 mr-2 text-slate-500"></i>
                            {{ $profile->contact_person_name }}
                        </div>
                        <a href="{{ 'mailto:' . $profile->contact_person_email }}"
                            class="flex items-center mt-3 text-indigo-600 truncate sm:whitespace-normal">
                            <i data-feather="at-sign" class="w-4 h-4 mr-2 text-slate-500"></i>
                            {{ $profile->contact_person_email }}
                        </a>
                        <a href='{{ 'tell:' . $profile->contact_person_number }}'
                            class="flex items-center mt-3 text-indigo-600 truncate sm:whitespace-normal">
                            <i data-feather="phone" class="w-4 h-4 mr-2 text-slate-500"></i>
                            {{ $profile->contact_person_number }}
                        </a>
                    </div>
                </div>
            </div>
            <ul class="flex flex-col justify-center w-full text-center sm:flex-row lg:justify-start">
                <li>
                    <button wire:click='showProfile'
                        class="block p-5 py-4 border-2 border-transparent  @if ($profileShow) font-medium border-b-indigo-600 @else text-gray-600 @endif">
                        <h6 class="font-medium">Profile</h6>
                    </button>
                </li>

                <li>
                    <button wire:click='showCertificatesAwards'
                        class="block p-5 py-4 border-2 border-transparent  @if ($certificatesAwardsShow) font-medium border-b-indigo-600 @else text-gray-600 @endif">
                        <h6 class="font-medium">Certificate / Award</h6>
                    </button>
                </li>

                <li>
                    <button wire:click='showProjects'
                        class="block p-5 py-4 border-2 border-transparent  @if ($projectsShow) font-medium border-b-indigo-600 @else text-gray-600 @endif">
                        <h6 class="font-medium">Projects</h6>
                    </button>
                </li>

                <li>
                    <button wire:click='showTeams'
                        class="block p-5 py-4 border-2 border-transparent  @if ($teamsShow) font-medium border-b-indigo-600 @else text-gray-600 @endif">
                        <h6 class="font-medium">Team Members</h6>
                    </button>
                </li>

                <li>
                    <button wire:click='showTestimonials'
                        class="block p-5 py-4 border-2 border-transparent  @if ($testimonialsShow) font-medium border-b-indigo-600 @else text-gray-600 @endif">
                        <h6 class="font-medium">Testimonials</h6>
                    </button>
                </li>

                <li>
                    <button wire:click='showTermsConditions'
                        class="block p-5 py-4 border-2 border-transparent  @if ($termsConditionsShow) font-medium border-b-indigo-600 @else text-gray-600 @endif">
                        <h6 class="font-medium">Terms & Conditions</h6>
                    </button>
                </li>

                <li>
                    <button wire:click.prefetch='showProducts'
                        class="block p-5 py-4 border-2 border-transparent  @if ($productsShow) font-medium border-b-indigo-600 @else text-gray-600 @endif">
                        <h6 class="font-medium">Products</h6>
                    </button>
                </li>
            </ul>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container>
        @if ($profileShow)
            <div class="pb-6 border-b border-gray-100 dark:border-gray-700">
                <blockquote class="text-xl italic font-semibold text-gray-900 dark:text-white">
                    <svg aria-hidden="true" class="w-10 h-10 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
                            fill="currentColor" />
                    </svg>
                    <p>{{ $profile->tagline }}</p>
                </blockquote>

                <blockquote
                    class="p-4 my-4 border-l-4 border-indigo-300 rounded-lg bg-blue-60 dark:border-blue-600 dark:bg-indigo-800">
                    <div class="text-gray-900 dark:text-white ck-content">
                        {!! $profile->description !!}
                    </div>
                </blockquote>
            </div>
        @endif

        @if ($certificatesAwardsShow)
            <h5 class="text-xl font-semibold mt-[30px]">Certificates & Awards :</h5>

            <div class="grid lg:grid-cols-2 grid-cols-1 gap-[30px] pt-6">
                <div class="mt-[30px] lg:mt-0">
                    @foreach ($supplier_certificates as $item)
                        <div
                            class="flex items-center p-4 mt-6 transition-all duration-500 ease-in-out bg-white rounded-md shadow hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                            @if ($item->type == 'Award')
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="w-16 h-16 p-4 rounded-md shadow bg-slate-50 dark:bg-slate-800 dark:shadow-gray-800">
                                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="w-16 h-16 p-4 rounded-md shadow bg-slate-50 dark:bg-slate-800 dark:shadow-gray-800">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            @endif
                            <div class="flex-1 ml-4 content">
                                <h4 class="text-lg text-medium">{{ $item->title }}, {{ $item->type }}</h4>
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
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{ $item->name }}
                                <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                                    {{ $item->city . ', ' . $item->country }}</span>
                            </h3>

                            <blockquote
                                class="p-4 my-4 border-l-4 border-indigo-300 rounded-lg bg-blue-60 dark:border-blue-600 dark:bg-indigo-800">
                                <div class="text-gray-900 dark:text-white ck-content">
                                    {!! $item->description !!}
                                </div>
                            </blockquote>

                            <blockquote class="text-xl italic font-semibold text-gray-900 dark:text-white">
                                <svg aria-hidden="true" class="w-10 h-10 text-gray-400 dark:text-gray-600"
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
        @endif

        @if ($teamsShow)
            <h5 class="text-xl font-semibold mt-[30px]">Team Members :</h5>

            <div class="grid lg:grid-cols-5 mt-4 md:grid-cols-2 grid-cols-1 gap-[30px]">
                @foreach ($supplier_teams as $item)
                    <div
                        class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                        <div class="relative">
                            <img class="object-cover w-full h-40" src="{{ asset('storage/' . $item->image) }}"
                                alt="">
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
        @endif

        @if ($termsConditionsShow)
            <h5 class="text-xl font-semibold mt-[30px]">Terms & Conditions :</h5>

            <blockquote
                class="p-4 my-4 border-l-4 border-indigo-300 rounded-lg bg-blue-60 dark:border-blue-600 dark:bg-indigo-800">
                <div class="text-gray-900 dark:text-white ck-content">
                    {!! $profile->terms_conditions !!}
                </div>
            </blockquote>
        @endif

        @if ($productsShow)
            @livewire('frontend.filters.supplier-products', ['profile_id' => $profile->id, 'type' => 'Profile Page', 'page_title' => 'All Products'])
        @endif
    </x-frontend.index-container>
</div>
