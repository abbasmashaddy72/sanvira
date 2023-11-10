<?php

namespace App\Livewire\Frontend\Filters;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
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
        $this->availableLetters = Category::where('parent_id', 0)->pluck('name')->map(function ($name) {
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
        if (Category::count() <= 16) {
            $categories = Category::where('parent_id', 0)->withCount('products')->get();
            $filter = false;
        } else {
            if ($this->alphabet === '#') {
                $categories = Category::where('parent_id', 0)->withCount('products')->where('name', 'REGEXP', '^[0-9]')->get();
            } else {
                $categories = Category::where('parent_id', 0)->withCount('products')->where('name', 'like', $this->alphabet . '%')->get();
            }
            $filter = true;
        }

        return view('livewire.frontend.filters.categories', compact('categories', 'filter'));
    }
}
