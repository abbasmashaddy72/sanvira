@push('meta')
    @include('layouts.fePartials.meta', [
        'title' => 'Blogs',
        'description' => 'Some Text for SEO',
        'keywords' => 'Some Keywords for SEO',
    ])
@endpush
<x-guest-layout>
    <x-frontend.index-container class="py-36">
        <x-slot name='banner_name'>
            {{ __('Blogs') }}
        </x-slot>

        @livewire('frontend.filters.blogs')

    </x-frontend.index-container>
</x-guest-layout>
