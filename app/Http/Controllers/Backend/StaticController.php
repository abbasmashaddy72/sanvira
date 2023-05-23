<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function homepage()
    {
        view()->share('title', 'Home Page');

        return view('pages.backend.static.index');
    }

    public function privacy_policy()
    {
        view()->share('title', 'Privacy Policy');

        return view('pages.backend.static.privacy_policy');
    }

    public function terms_of_use()
    {
        view()->share('title', 'Terms of Use');

        return view('pages.backend.static.terms_of_use');
    }

    public function return_refund()
    {
        view()->share('title', 'Returns & Refund');

        return view('pages.backend.static.return_refund');
    }

    public function career()
    {
        view()->share('title', 'Career');

        return view('pages.backend.static.career');
    }

    public function image_upload(Request $request)
    {
        $blog = new Supplier();
        $blog->id = 0;
        $blog->exists = true;
        $image = $blog->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $image->getUrl('thumb')
        ]);
    }
}
