@if (!empty($images))
    <div class="flex space-x-2">
        @foreach (json_decode($images) as $item)
            <a href="{{ asset('storage/' . $item) }}" data-lightbox="{{ strtolower(str_replace(' ', '_', $name)) }}">
                <img class="w-12 h-12 rounded-lg shadow-md" src='{{ asset('storage/' . $item) }}' />
            </a>
        @endforeach
    </div>
@else
    <a href="{{ asset('storage/' . $image) }}" data-lightbox="{{ strtolower(str_replace(' ', '_', $image)) }}">
        <img class="object-cover w-10 h-10 rounded-lg shadow-md" src='{{ asset('storage/' . $image) }}' />
    </a>
@endif
