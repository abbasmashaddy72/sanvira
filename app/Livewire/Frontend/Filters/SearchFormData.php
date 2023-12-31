<?php

namespace App\Livewire\Frontend\Filters;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class SearchFormData extends Component
{
    use WithPagination;

    public $data;

    public $productsList;

    public $categoriesList;

    public function render()
    {
        $this->productsList = Product::with(['country'])->where('title', 'like', $this->data . '%')->get();
        $this->categoriesList = Category::where('name', 'like', $this->data . '%')->withCount('products')->get();

        return view('livewire.frontend.filters.search-form-data');
    }
}
