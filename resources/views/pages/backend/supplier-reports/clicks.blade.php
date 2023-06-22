<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('supplier.report.clicks') }}</x-slot>

    <x-backend.grid>
        <x-slot name="rt_button">
            <div class="flex items-center space-x-2">
                <p class="font-semibold">{{ __('Select Report Type:') }}</p>
                <x-native-select id="typeSelect" placeholder="Select Report Type" :options="['Products', 'Categories', 'Brands', 'Manufacturers']" />
            </div>
        </x-slot>

        @livewire('backend.filters.supplier-clicks-report')
    </x-backend.grid>

    <div wire:ignore>
        <script>
            document.addEventListener('livewire:load', function() {
                document.getElementById('typeSelect').addEventListener('change', function() {
                    Livewire.emit('checkSelect', this.value);
                });
            });
        </script>
    </div>
</x-app-layout>
