<div class="flex justify-center">
    <input type="checkbox" wire:model="selected" value="{{ $value }}"
        @if (property_exists($this, 'pinnedRecords') && in_array($value, $this->pinnedRecords)) checked @endif
        class="form-checkbox mt-1 h-4 w-4 text-blue-600 transition duration-150 ease-in-out" />
</div>
