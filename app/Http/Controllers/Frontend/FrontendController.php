<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Faq;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $testimonials = Testimonial::inRandomOrder()->take(8)->get();
        $blogs =  Blog::inRandomOrder()->take(6)->get();
        $faqs =  Faq::get();

        return view('pages.frontend.index', compact([
            'sliders',
            'testimonials',
            'blogs',
            'faqs',
        ]));
    }

    public function blogs()
    {
        /**
         * @get('/blogs')
         * @name('blogs')
         * @middlewares('web')
         */
        view()->share('title', 'Blogs');

        return view('pages.frontend.blogs');
    }

    public function blog_single($id)
    {
        /**
         * @get('/blog_single')
         * @name('blog_single')
         * @middlewares('web')
         */
        Blog::where('id', $id)->increment('clicks');
        $data = Blog::findOrFail($id);
        view()->share('title', $data->title);
        $related = Blog::whereNotIn('id', [$data->id])->orderBy('clicks', 'DESC')->limit(3)->get();

        return view('pages.frontend.blog_single', compact('data', 'related'));
    }

    public function searchForm(Request $request)
    {
        $data = $request->search;
        view()->share('title', $request->search);

        return view('pages.frontend.searchForm', compact('data'));
    }

    public function all_products_category()
    {
        view()->share('title', 'All Available Categories');

        return view('pages.frontend.category');
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

    public function products_sales($sales_id)
    {
        view()->share('title', 'On Sale Products');

        return view('pages.frontend.sales_page', compact('sales_id'));
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

        return view('pages.frontend.products_details', compact([
            'data',
        ]));
    }

    public function about_us()
    {
        view()->share('title', 'About Us');

        return view('pages.frontend.about_us');
    }

    public function contact_us()
    {
        view()->share('title', 'Contact Us');

        return view('pages.frontend.contact_us');
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
