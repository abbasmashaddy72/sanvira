<x-guest-layout>
    @push('styles')
        <style>
            .checkbox:checked+.check-icon {
                display: flex;
            }
        </style>
    @endpush

    @if (\Route::currentRouteName() == 'all_products_category')
        @livewire('frontend.pages.product-category-page')
    @else
        @livewire('frontend.pages.product-category-page', ['product_category' => $product_category])
    @endif

    @push('scripts')
        <script>
            function showFilters() {
                var fSection = document.getElementById("filterSection");
                if (fSection.classList.contains("hidden")) {
                    fSection.classList.remove("hidden");
                    fSection.classList.add("block");
                } else {
                    fSection.classList.add("hidden");
                }
            }

            function applyFilters() {
                document.querySelectorAll("input[type=checkbox]").forEach((el) => (el.checked = false));
            }

            function closeFilterSection() {
                var fSection = document.getElementById("filterSection");
                fSection.classList.add("hidden");
            }
        </script>
    @endpush
</x-guest-layout>
