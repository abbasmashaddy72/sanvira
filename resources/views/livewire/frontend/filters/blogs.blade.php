<div>
    <!-- Blog Grip -->
    <div class="-mx-4 flex flex-wrap">
        <!-- First Repeater -->
        <div class="mx-auto grid grid-cols-2 gap-1 md:grid-cols-4 md:gap-4">
            @forelse ($data as $item)
                <div class="flex w-full flex-col px-4">
                    <div class="wow fadeInUp shadow-testimonial group mb-10 flex-1 rounded-lg border-2 border-gray-200 bg-white p-4"
                        data-wow-delay=".1s">
                        <div class="mb-8 overflow-hidden rounded">
                            <a href="{{ route('blog_single', ['id' => $item->id]) }}" class="block">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                    class="h-56 w-full object-cover transition group-hover:rotate-6 group-hover:scale-125" />
                            </a>
                        </div>
                        <div>
                            <div class="flex justify-end">
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
                        </div>
                    </div>
                </div>
            @empty
                <div class="w-full px-4">
                    <div class="text-center text-lg font-bold text-gray-800">No Data Available</div>
                </div>
            @endforelse
        </div>

    </div>
    {{ $data->links() }}
</div>
