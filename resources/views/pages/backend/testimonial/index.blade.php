<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('testimonial.index') }}</x-slot>

    @can('testimonial_list')
    <x-backend.grid title="Testimonials">
        <x-slot name="rt_button">
            <button onclick="Livewire.emit('openModal', 'backend.forms.modal-testimonial')"
                class="mr-2 shadow-md btn btn-primary">{{ __('Add') }}</button>
        </x-slot>

        <div class="col-span-12">
            @livewire('backend.tables.testimonials-table')
        </div>
    </x-backend.grid>
    @endcan
</x-app-layout>