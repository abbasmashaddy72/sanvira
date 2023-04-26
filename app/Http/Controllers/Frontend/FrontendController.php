<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\SupplierProduct;
use App\Models\SupplierProductAttributes;
use App\Models\SupplierProductCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $top_suppliers = [1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
        $home_image = get_static_option('home_image');
        $supplier_products_on_sale = SupplierProduct::where('on_sale', 1)->whereIn('supplier_id', $top_suppliers)->get()->unique('supplier_id')->take(9);
        $product_categories = SupplierProductCategory::where('parent_id', 0)->withCount('products')->get()->take(15);
        $suppliers = Supplier::get()->take(8);
        $featured_products = SupplierProduct::whereIn('supplier_id', $top_suppliers)->inRandomOrder()->get()->unique('supplier_id')->take(8);
        $top_suppliers = Supplier::whereIn('id', $top_suppliers)->get();

        return view('pages.frontend.index', compact([
            'home_image',
            'supplier_products_on_sale',
            'product_categories',
            'suppliers',
            'featured_products',
            'top_suppliers'
        ]));
    }

    public function contact_us()
    {
        view()->share('title', 'Contact Us');

        return view('pages.frontend.contact_us');
    }

    public function supplier_products_sales($sales_id)
    {
        view()->share('title', 'On Sale Products');

        return view('pages.frontend.sales_page', compact('sales_id'));
    }

    public function products_category(SupplierProductCategory $product_category)
    {
        view()->share('title', $product_category->name);

        return view('pages.frontend.product_category', compact('product_category'));
    }

    public function all_products_category()
    {
        view()->share('title', 'All Available Categories');

        return view('pages.frontend.product_category');
    }

    public function supplier_profile(Supplier $profile)
    {
        view()->share('title', $profile->company_name);

        return view('pages.frontend.supplier', compact('profile'));
    }

    public function all_supplier_profile()
    {
        view()->share('title', 'All Supplier Profiles');

        return view('pages.frontend.all_suppliers');
    }

    public function products()
    {
        view()->share('title', 'All Products');

        return view('pages.frontend.products');
    }

    public function products_details(SupplierProduct $data)
    {
        view()->share('title', 'Products Details');
        $data_attributes = SupplierProductAttributes::where('supplier_product_id', $data->id)->get();

        return view('pages.frontend.products_details', compact([
            'data',
            'data_attributes'
        ]));
    }
}
