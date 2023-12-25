<x-backend.modal-form form-action="add" title="{{ $question }}">
    <div class="row-gap-0 grid-cols-1 gap-2 sm:grid">
        <x-input name="question" label="{{ __('Question') }}" type="text" wire:model='question' required />

        <x-textarea name="answer" wire:model='answer' label="Answer" required />
    </div>
</x-backend.modal-form>
