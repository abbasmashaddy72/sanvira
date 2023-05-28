<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('homepage.index') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            @livewire('backend.forms.static-homepage', ['type' => 'Homepage'])
        </div>
    </x-backend.grid>

    @can('slider_list')
        <x-backend.grid title='Sliders'>
            <div class="col-span-12">

                <x-slot name="rt_button">
                    <button onclick="Livewire.emit('openModal', 'backend.forms.modal-slider')"
                        class="mr-2 shadow-md btn btn-primary">{{ __('Add') }}</button>
                </x-slot>

                <div class="py-12">
                    @livewire('backend.tables.sliders-table')
                </div>
            </div>
        </x-backend.grid>
    @endcan
</x-app-layout>
