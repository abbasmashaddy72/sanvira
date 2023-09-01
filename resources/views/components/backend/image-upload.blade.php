@props(['images' => null, 'isUploaded' => false, 'label' => null, 'name' => null, 'model' => null, 'deletId' => null])

<div class="card-body">
    @if ($images)
        @if (is_array($images))
            {{ __('Uploaded Images Preview:') }}
            <div class="grid grid-cols-5 gap-1">
                @foreach ($images as $image)
                    <div class="relative">
                        <img class="object-cover w-10 h-10 rounded-md"
                            src="{{ $isUploaded ? $image->temporaryUrl() : asset('storage/' . $image) }}"
                            onerror="this.onerror=null; this.src='https://placehold.co/200';">
                        <button type="button" wire:click='deleteImage({{ $deletId }}, {{ $loop->index }})'>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute text-red-500 bg-white -top-2 right-2 rounded-xl hover:text-red-600"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-x-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="15" y1="9" x2="9" y2="15">
                                </line>
                                <line x1="9" y1="9" x2="15" y2="15">
                                </line>
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>
        @else
            <div class="relative">
                {{ __('Uploaded Image Preview:') }}
                <img class="object-cover w-10 h-10 rounded-md"
                    src="{{ $isUploaded ? $images->temporaryUrl() : asset('storage/' . $images) }}"
                    onerror="this.onerror=null; this.src='https://placehold.co/200';">
            </div>
        @endif
    @endif
    <div class="mb-3">
        <x-input :name="$name" :label="$label" type="file" :wire:model.defer="$model" :multiple="is_array($images)" />
        <div wire:loading wire:target="{{ $model }}">{{ __('Uploading...') }}</div>
    </div>
</div>
