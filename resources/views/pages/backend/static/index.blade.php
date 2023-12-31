<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('homepage.index') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            @livewire('backend.static-homepage', ['type' => 'Homepage'])
        </div>
    </x-backend.grid>

    @can('slider_list')
        <x-backend.grid title='Sliders'>
            <div class="col-span-12">

                <x-slot name="rt_button">
                    <button onclick="Livewire.dispatch('openModal', { component: 'backend.modal-slider' } )"
                        class="btn btn-primary mr-2 shadow-md">{{ __('Add') }}</button>
                </x-slot>

                <div class="py-12">
                    @livewire('backend.table-slider')
                </div>
            </div>
        </x-backend.grid>
    @endcan
</x-app-layout>
