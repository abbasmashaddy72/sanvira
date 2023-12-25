<x-guest-layout>
    <x-frontend.index-container class="table w-full bg-white py-36 lg:py-44">
        <div class="mt-10 grid grid-cols-1 items-center gap-[30px] md:grid-cols-12">
            <div class="md:col-span-7">
                <div class="me-6">
                    <h4
                        class="mb-5 text-4xl font-semibold leading-normal text-black dark:text-white lg:text-5xl lg:leading-normal">
                        {{ get_static_option('tag_line') }}
                    </h4>
                    <p class="max-w-xl text-lg text-slate-400">{{ get_static_option('hero_message') }}</p>

                    <div class="mt-6">
                        <a href="{{ route('contact_us') }}"
                            class="btn me-2 mt-2 rounded-md border-indigo-600 bg-indigo-600 text-white hover:border-indigo-700 hover:bg-indigo-700"><i
                                class="uil uil-phone"></i> Contact Us</a>
                    </div>
                </div>
            </div>

            <div class="md:col-span-5">
                <img src="{{ get_static_option('hero_image') }}" alt />
            </div>
        </div>
    </x-frontend.index-container>

    @if (count($sliders) > 0)
        <x-frontend.index-container class="border-b border-t border-gray-100 bg-white py-6 dark:border-gray-700">
            <div class="grid grid-cols-2 justify-center gap-2 md:grid-cols-6">
                @foreach ($sliders as $slider)
                    <div class="mx-auto py-4">
                        <img src="{{ asset('storage/' . $slider->image) }}" class="h-12" alt='{{ $slider->name }}'
                            onerror="this.onerror=null; this.src='https://placehold.co/320x120';" />
                    </div>
                @endforeach
            </div>
        </x-frontend.index-container>
    @endif

    <x-frontend.index-container class="relative bg-gray-50 py-16 dark:bg-slate-800 md:py-24">
        <div class="mt-10 grid grid-cols-1 items-center gap-[30px] md:grid-cols-2 lg:grid-cols-12">
            <div class="mt-8 md:mt-0 lg:col-span-6">
                <div class="lg:ms-10">
                    <h3 class="mb-6 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">
                        Mission
                    </h3>
                    <p class="max-w-xl text-slate-400">
                        {{ get_static_option('mission_message') }}
                    </p>

                    @php
                        $mission_points_data = explode(';', get_static_option('mission_points')) ?? [];
                    @endphp
                    <ul class="mt-4 list-none text-slate-400">
                        @for ($i = 0; $i < count($mission_points_data); $i++)
                            @if (!empty($mission_points_data[$i]))
                                <li class="mb-1 flex">
                                    <i class="ri-checkbox-circle-line me-2 text-xl text-indigo-600"></i>
                                    {{ $mission_points_data[$i] }}
                                </li>
                            @endif
                        @endfor
                    </ul>
                </div>
            </div>
            <div class="mt-8 md:mt-0 lg:col-span-6">
                <div class="lg:ms-10">
                    <h3 class="mb-6 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">
                        Vision
                    </h3>
                    <p class="max-w-xl text-slate-400">
                        {{ get_static_option('vision_message') }}
                    </p>

                    @php
                        $vision_points_data = explode(';', get_static_option('vision_points')) ?? [];
                    @endphp
                    <ul class="mt-4 list-none text-slate-400">
                        @for ($i = 0; $i < count($vision_points_data); $i++)
                            @if (!empty($vision_points_data[$i]))
                                <li class="mb-1 flex">
                                    <i class="ri-checkbox-circle-line me-2 text-xl text-indigo-600"></i>
                                    {{ $vision_points_data[$i] }}
                                </li>
                            @endif
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </x-frontend.index-container>

    @if (count($testimonials) > 0)
        <x-frontend.index-container containerTitle="{{ __('Testimonials') }}" class="bg-white py-14" id="testimonials"
            containerSlot="{{ get_static_option('testimonial_message') }}">
            <div class="relative mt-8 grid grid-cols-1">
                <div class="tiny-two-item">
                    @foreach ($testimonials as $item)
                        <div class="tiny-slide">
                            <div
                                class="relative m-2 overflow-hidden rounded-md p-6 shadow dark:shadow-gray-800 lg:flex lg:p-0">
                                <img class="mx-auto h-24 w-24 rounded-full lg:h-auto lg:w-48 lg:rounded-none"
                                    src="{{ asset('storage/' . $item->logo) }}" alt width="384" height="512"
                                    onerror="this.onerror=null; this.src='https://placehold.co/512x512';" />
                                <div class="space-y-4 pt-6 text-center lg:p-6 ltr:lg:text-left rtl:lg:text-right">
                                    <p class="text-base text-slate-400">
                                        " {{ $item->message }} "
                                    </p>

                                    <div>
                                        <span class="mb-1 block text-indigo-600">{{ $item->name }}</span>
                                        <span
                                            class="block text-sm text-slate-400 dark:text-white/60">{{ $item->designation }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </x-frontend.index-container>
    @endif

    @if (count($blogs) > 0)
        <x-frontend.index-container class="relative bg-gray-50 py-16 dark:bg-slate-800 md:py-24"
            containerTitle="{{ __('Blogs') }}" containerSlot="{{ get_static_option('blog_message') }}">
            <div class="mt-8 grid grid-cols-1 gap-[30px] md:grid-cols-2 lg:grid-cols-3">

                @foreach ($blogs as $item)
                    <div class="blog wow animate__animated animate__fadeInUp relative overflow-hidden rounded-md shadow dark:shadow-gray-800"
                        data-wow-delay=".3s">
                        <img src="{{ asset('storage/' . $item->image) }}" alt=""
                            onerror="this.onerror=null; this.src='https://placehold.co/512x320';" />

                        <div class="content p-6">
                            <a href="{{ route('blogs', ['id' => $item->id]) }}"
                                class="title h5 text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">{{ $item->title }}</a>
                            {{-- <p class="mt-3 text-slate-400">
                                {{ $item->excert }}
                            </p> --}}

                            <div class="mt-4">
                                <a href="{{ route('blogs', ['id' => $item->id]) }}"
                                    class="btn btn-link font-normal duration-500 ease-in-out after:bg-indigo-600 hover:text-indigo-600">Read
                                    More <i class="uil uil-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-6 text-center">
                <a href="{{ route('blogs') }}"
                    class="btn mt-4 rounded-md border-indigo-600 bg-indigo-600 text-white hover:border-indigo-700 hover:bg-indigo-700">All
                    Blogs</a>
            </div>
        </x-frontend.index-container>
    @endif

    @if (count($faqs) > 0)
        <x-frontend.index-container class="relative bg-white py-16 dark:bg-slate-800 md:py-24" id='faqs'
            containerTitle="{{ __('FAQs') }}" containerSlot="{{ get_static_option('faqs_message') }}">
            <div class="relative mt-8 grid grid-cols-1 items-center gap-[30px] md:grid-cols-12">
                <div class="md:col-span-12">
                    <div id="accordion-collapse" data-accordion="collapse">
                        @foreach ($faqs as $item)
                            <div class="relative overflow-hidden rounded-md shadow dark:shadow-gray-800">
                                <h2 class="text-base font-semibold"
                                    id="accordion-collapse-heading-{{ $loop->index }}">
                                    <button type="button"
                                        class="flex w-full items-center justify-between p-5 font-medium ltr:text-left rtl:text-right"
                                        data-accordion-target="#accordion-collapse-body-{{ $loop->index }}"
                                        aria-expanded="true"
                                        aria-controls="accordion-collapse-body-{{ $loop->index }}">
                                        <span>{{ $item->question }}</span>
                                        <svg data-accordion-icon class="h-4 w-4 shrink-0 rotate-180" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-{{ $loop->index }}" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-{{ $loop->index }}">
                                    <div class="p-5">
                                        <p class="text-slate-400 dark:text-gray-400">
                                            {{ $item->answer }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </x-frontend.index-container>
    @endif

    <x-frontend.index-container class="relative bg-gray-50 py-16 dark:bg-slate-800 md:py-24">
        <div class="grid grid-cols-1 text-center">
            <h3 class="mb-6 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">
                Have Question ? Get in touch!
            </h3>

            <p class="mx-auto max-w-xl text-slate-400">
                {{ get_static_option('cta_message') }}
            </p>

            <div class="mt-6">
                <a href="{{ route('contact_us') }}"
                    class="btn mt-4 rounded-md border-indigo-600 bg-indigo-600 text-white hover:border-indigo-700 hover:bg-indigo-700"><i
                        class="uil uil-phone"></i> Contact us</a>
            </div>
        </div>
    </x-frontend.index-container>
</x-guest-layout>
