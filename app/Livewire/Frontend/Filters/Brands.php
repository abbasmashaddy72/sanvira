<?php

namespace App\Livewire\Frontend\Filters;

use App\Models\Brand;
use Livewire\Component;

class Brands extends Component
{
    // Filter Keys
    public $availableLetters;

    public $alphabet = 'A';

    public function apply($item)
    {
        $this->alphabet = $item;
    }

    public function mount()
    {
        $this->availableLetters = Brand::pluck('name')->map(function ($name) {
            return substr($name, 0, 1);
        })->unique()->sort()->toArray();

        if (is_numeric(reset($this->availableLetters))) {
            $this->alphabet = '#';
        } else {
            $this->alphabet = reset($this->availableLetters);
        }
    }

    public function render()
    {
        if (Brand::count() <= 16) {
            $brands = Brand::withCount('products')->get();
            $filter = false;
        } else {
            if ($this->alphabet === '#') {
                $brands = Brand::withCount('products')->where('name', 'REGEXP', '^[0-9]')->get();
            } else {
                $brands = Brand::withCount('products')->where('name', 'like', $this->alphabet . '%')->get();
            }
            $filter = true;
        }

        return view('livewire.frontend.filters.brands', compact('brands', 'filter'));
    }
}
