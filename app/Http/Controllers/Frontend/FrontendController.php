<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Supplier;
use App\Models\SupplierProduct;
use App\Models\SupplierProductCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $featured_suppliers = Supplier::withCount('products')->whereHas('transactions', function ($query) {
            $query->where('account_type', '=', 'Featured');
        })->get()->take(14);
        $product_categories = SupplierProductCategory::where('parent_id', 0)->withCount('products')->get()->take(15);
        $featured_brands = Brand::withCount('products')->whereHas('transactions', function ($query) {
            $query->where('account_type', '=', 'Featured');
        })->get()->take(14);
        $on_sale_products = SupplierProduct::with(['brands', 'manufacturers', 'supplierProductCategory'])->where('on_sale', 1)->whereIn('supplier_id', $featured_suppliers->pluck('id'))->get()->take(8);
        $suppliers = Supplier::get()->take(8);

        return view('pages.frontend.index', compact([
            'sliders',
            'featured_suppliers',
            'product_categories',
            'featured_brands',
            'on_sale_products',
            'suppliers',
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
        $profile->with('manager');

        return view('pages.frontend.supplier', compact('profile'));
    }

    public function all_supplier_profile()
    {
        view()->share('title', 'All Supplier Profiles');

        return view('pages.frontend.all_suppliers');
    }

    public function all_products()
    {
        view()->share('title', 'All Products');

        return view('pages.frontend.products');
    }

    public function products_details(SupplierProduct $data)
    {
        view()->share('title', $data->name);
        $data->with(['brands', 'manufactures', 'productAttributes']);

        return view('pages.frontend.products_details', compact([
            'data'
        ]));
    }

    public function searchForm(Request $request)
    {
        $data = $request->search;
        view()->share('title', $request->search);

        return view('pages.frontend.searchForm', compact('data'));
    }

    public function all_brands()
    {
        view()->share('title', 'All Brands');

        return view('pages.frontend.brands');
    }

    public function brand_products(Brand $brand)
    {
        view()->share('title', $brand->name);

        return view('pages.frontend.brands_details', compact('brand'));
    }

    public function about_us()
    {
        view()->share('title', 'About Us');
        $featured_suppliers = Supplier::whereHas('transactions', function ($query) {
            $query->where('account_type', '=', 'Featured');
        })->get()->take(14);

        return view('pages.frontend.about_us', compact('featured_suppliers'));
    }

    public function privacy_policy()
    {
        view()->share('title', 'Privacy Policy');

        return view('pages.frontend.privacy_policy');
    }

    public function terms_of_use()
    {
        view()->share('title', 'Terms of Use');

        return view('pages.frontend.terms_of_use');
    }

    public function return_refund()
    {
        view()->share('title', 'Returns & Refund');

        return view('pages.frontend.return_refund');
    }

    public function career()
    {
        view()->share('title', 'Career');

        return view('pages.frontend.career');
    }
}
