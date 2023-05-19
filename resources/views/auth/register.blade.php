<x-guest-layout>
    <x-slot name='topSection'></x-slot>
    <x-frontend.index-container class="py-16 mt-16">
        <div class="flex justify-center">
            @livewire('frontend.form.register-form')
        </div>
    </x-frontend.index-container>
</x-guest-layout>
