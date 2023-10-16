<?php

namespace App\Http\Controllers\Frontend;

use App\Models\BrandView;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\VendorView;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryView;
use App\Models\ProductView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $product_categories = Category::where('parent_id', 0)->withCount('products')->get()->take(8);
        $featured_brands = Brand::withCount('products')->where('account_type', '=', 'Featured')->get()->take(8);

        return view('pages.frontend.index', compact([
            'sliders',
            'product_categories',
            'featured_brands',
        ]));
    }

    public function contact_us()
    {
        view()->share('title', 'Contact Us');

        return view('pages.frontend.contact_us');
    }

    public function products_sales($sales_id)
    {
        view()->share('title', 'On Sale Products');

        return view('pages.frontend.sales_page', compact('sales_id'));
    }

    public function products_category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            abort(404);
        }

        view()->share('title', $category->name);
        CategoryView::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'category_id' => $category->id,
            ],
            [
                'clicks' => DB::raw('clicks + 1'),
            ]
        );
        return view('pages.frontend.category', compact('category'));
    }

    public function all_products_category()
    {
        view()->share('title', 'All Available Categories');

        return view('pages.frontend.category');
    }

    public function all_products()
    {
        view()->share('title', 'All Products');

        return view('pages.frontend.products');
    }

    public function products_details($slug)
    {
        $data = Product::where('slug', $slug)->first();

        if (!$data) {
            abort(404);
        }

        view()->share('title', $data->title);
        $data->with(['brands', 'Vendors', 'productAttributes', 'Category']);
        ProductView::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'product_id' => $data->id,
            ],
            [
                'clicks' => DB::raw('clicks + 1'),
            ]
        );
        BrandView::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'brand_id' => $data->brand_id,
            ],
            [
                'clicks' => DB::raw('clicks + 1'),
            ]
        );
        VendorView::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'vendor_id' => $data->vendor_id,
            ],
            [
                'clicks' => DB::raw('clicks + 1'),
            ]
        );
        return view('pages.frontend.products_details', compact([
            'data',
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

    public function brand_products($slug)
    {
        $brand = Brand::where('slug', $slug)->first();

        if (!$brand) {
            abort(404);
        }

        view()->share('title', $brand->name);

        return view('pages.frontend.brands_details', compact('brand'));
    }

    public function about_us()
    {
        view()->share('title', 'About Us');
        $featured_brands = Brand::where('account_type', '=', 'Featured')->get()->take(14);

        return view('pages.frontend.about_us', compact('featured_brands'));
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

    public function return_refunds()
    {
        view()->share('title', 'Returns & Refund');

        return view('pages.frontend.return_refunds');
    }
}
