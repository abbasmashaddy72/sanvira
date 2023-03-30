<?php

namespace App\Http\Livewire\Frontend\Filters;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierProfiles extends Component
{
    use WithPagination;

    public function render()
    {
        $suppliers = Supplier::paginate(8);

        return view('livewire.frontend.filters.supplier-profiles', compact('suppliers'));
    }
}
