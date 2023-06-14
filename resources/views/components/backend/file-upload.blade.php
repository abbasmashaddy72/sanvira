@props(['files' => null, 'isUploaded' => false, 'label' => null, 'name' => null, 'model' => null, 'deletId' => null])

<div class="card-body">
    @if ($files)
        @if (is_array($files))
            Uploaded Files Preview:
            <div class="grid grid-cols-5 gap-1">
                @foreach ($files as $file)
                    <div class="col-span-5 flex justify-between">
                        <p class="text-sm text-gray-800">{{ $file }}</p>
                        <button type="button" wire:click='deleteImage({{ $deletId }}, {{ $loop->index }})'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-trash-2">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>
        @else
            <div class="relative">
                Uploaded File Preview:
                <p class="text-sm text-gray-800">{{ $file }}</p>
            </div>
        @endif
    @endif
    <div class="mb-3">
        <x-input :name="$name" :label="$label" type="file" :wire:model.defer="$model" :multiple="is_array($files)" />
        <div wire:loading wire:target="{{ $model }}">Uploading...</div>
    </div>
</div>
