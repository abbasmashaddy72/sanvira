<?php

namespace App\Http\Livewire\Frontend\Pages;

use App\Models\SupplierProduct;
use App\Models\SupplierProductCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCategoryPage extends Component
{
    use WithPagination;
    // Custom Set Data
    public $product_category;

    public function render()
    {
        if (!empty($this->product_category)) {
            $sub_product_category = SupplierProductCategory::where('parent_id', $this->product_category->id)->get();
            $category_based_products = SupplierProduct::where('supplier_product_category_id', $this->product_category->id)->paginate(6);
        } else {
            $sub_product_category = SupplierProductCategory::where('parent_id', 0)->get();
            $category_based_products = [];
        }

        return view('livewire.frontend.pages.product-category-page', compact([
            'sub_product_category',
            'category_based_products',
        ]));
    }
}
