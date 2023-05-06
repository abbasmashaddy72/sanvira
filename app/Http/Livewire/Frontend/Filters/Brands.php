<?php

namespace App\Http\Livewire\Frontend\Filters;

use App\Models\Brand;
use Livewire\Component;

class Brands extends Component
{
    // Filter Values
    public $availableLetters, $alphabet = 'A';

    public function apply($item)
    {
        $this->alphabet = $item;
    }

    public function mount()
    {
        $this->availableLetters = Brand::pluck('name')->map(function ($name) {
            return substr($name, 0, 1);
        })->unique()->toArray();
    }

    public function render()
    {
        $brands = Brand::withCount('products')->where('name', 'like', $this->alphabet . "%")->get();
        $featured_brands = Brand::withCount('products')->whereHas('transactions', function ($query) {
            $query->where('account_type', '=', 'Featured');
        })->get()->take(9);

        return view('livewire.frontend.filters.brands', compact('brands', 'featured_brands'));
    }
}
