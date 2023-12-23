<?php

namespace App\Livewire\Frontend\Form;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

class Search extends Component
{
    // Custom Keys
    public $query;

    public $type;

    public $productsList;

    public $categoriesList;

    public function mount()
    {
        $this->resetData();
    }

    public function resetData()
    {
        $this->query = '';
        $this->productsList = [];
    }

    public function updatedQuery()
    {
        $this->productsList = Product::where('title', 'like', $this->query . '%')->get();
        $this->categoriesList = Category::where('name', 'like', $this->query . '%')->get();
    }

    public function render()
    {
        return view('livewire.frontend.form.search');
    }
}
