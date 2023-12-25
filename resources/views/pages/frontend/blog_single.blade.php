@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script>
        window.addEventListener('load', function() {
            document.querySelectorAll('oembed[url]').forEach(element => {
                // get just the code for this youtube video from the url
                let vCode = element.attributes.url.value.split('?v=')[1];
                // paste some BS5 embed code in place of the Figure tag
                element.parentElement.outerHTML = `
    <div class="aspect-w-16 aspect-h-9">
        <iframe src="https://www.youtube.com/embed/${vCode}?rel=0" width="800" height="450" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>`;
            });
        })
    </script>
    <script>
        window.addEventListener('load', function() {
            document.querySelectorAll('p > a').forEach(element => {
                // get just the code for this youtube video from the url
                let href = element.attributes.href.value;
                let text = element.innerHTML;
                // paste some BS5 embed code in place of the Figure tag
                element.parentElement.outerHTML =
                    `
                <p class="m-2 text-center"><a class="ml-6 text-white capitalize bg-blue-500 btn-sm hover:bg-blue-300" href="${href}">${text}</a></p>`;
            });
        })
    </script>
@endpush
@push('meta')
    @include('layouts.fePartials.meta', [
        'title' => $data->title,
        'description' => $data->excerpt,
        'image' => '//images.weserv.nl/?url=' . asset('storage/' . $data->image) . '&w=200&h=200',
        'keywords' => $data->tags,
    ])
@endpush
<x-guest-layout>
    <x-frontend.index-container class="py-36">
        <x-slot name='banner_name'>
            {{ $data->title }}
        </x-slot>

        <!-- Blog Details -->
        <div class="-mx-4 flex flex-wrap justify-center">
            <div class="w-full px-4">
                <div class="-mx-4 flex flex-col items-center justify-center">
                    <div class="w-full px-4 lg:w-8/12">
                        <div>
                            <div class="ck-content mb-8">
                                {!! $data->description !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="-mx-4 flex flex-wrap">
            <div class="wow fadeInUp mt-14 w-full px-4" data-wow-delay=".2s">
                <h2 class="text-dark relative pb-5 text-2xl font-semibold sm:text-[28px]">
                    Related Blogs
                </h2>
                <span class="bg-primary mb-10 inline-block h-[2px] w-20"></span>
            </div>
            <!-- First Repeater -->
            @foreach ($related as $item)
                <div class="flex w-full flex-col px-4 md:w-1/2 lg:w-1/3">
                    <div class="wow fadeInUp shadow-testimonial group mb-10 flex-1 rounded-lg border-2 border-gray-200 bg-white p-4"
                        data-wow-delay=".1s">
                        <div class="mb-8 overflow-hidden rounded">
                            <a href="{{ route('blog_single', ['id' => $item->id]) }}" class="block">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                    class="h-56 w-full object-cover transition group-hover:rotate-6 group-hover:scale-125" />
                            </a>
                        </div>
                        <div>
                            <div class="flex justify-between">
                                <span
                                    class="bg-primary mb-5 inline-block rounded px-4 py-1 text-center text-xs font-semibold leading-loose text-white">
                                    {{ $item->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <h3>
                                <a href="{{ route('blog_single', ['id' => $item->id]) }}"
                                    class="teloginxt-xl text-dark hover:text-primary mb-4 inline-block font-semibold sm:text-2xl lg:text-xl xl:text-2xl">
                                    {{ $item->title }}
                                </a>
                            </h3>
                            <p class="text-body-color whitespace-pre-line text-base">
                                {{ $item->excerpt }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </x-frontend.index-container>
</x-guest-layout>
