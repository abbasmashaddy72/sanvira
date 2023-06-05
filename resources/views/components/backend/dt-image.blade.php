@if (!empty($images))
    <div class="flex space-x-2">
        @foreach (json_decode($images) as $item)
            <a href="{{ asset('storage/' . $item) }}" data-lightbox="{{ strtolower(str_replace(' ', '_', $name)) }}">
                <img class="h-12 w-12 rounded-lg shadow-md" src='{{ asset('storage/' . $item) }}' />
            </a>
        @endforeach
    </div>
@else
    <a href="{{ asset('storage/' . $image) }}" data-lightbox="{{ strtolower(str_replace(' ', '_', $image)) }}">
        <img class="h-10 w-10 rounded-lg object-cover shadow-md" src='{{ asset('storage/' . $image) }}' />
    </a>
@endif
