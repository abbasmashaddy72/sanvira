<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StaticController extends Controller
{
    public function homepage()
    {
        view()->share('title', 'Home Page');
        abort_if(Gate::denies('homepage'), 403);

        return view('pages.backend.static.index');
    }

    public function privacy_policy()
    {
        view()->share('title', 'Privacy Policy');
        abort_if(Gate::denies('privacy_policy'), 403);

        return view('pages.backend.static.privacy_policy');
    }

    public function terms_of_use()
    {
        view()->share('title', 'Terms of Use');
        abort_if(Gate::denies('terms_of_use'), 403);

        return view('pages.backend.static.terms_of_use');
    }

    public function return_refunds()
    {
        view()->share('title', 'Returns & Refunds');
        abort_if(Gate::denies('role_list'), 403);

        return view('pages.backend.static.return_refunds');
    }

    public function career()
    {
        view()->share('title', 'Career');
        abort_if(Gate::denies('career'), 403);

        return view('pages.backend.static.career');
    }

    public function image_upload(Request $request)
    {
        $blog = new Supplier;
        $blog->id = 0;
        $blog->exists = true;
        $image = $blog->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $image->getUrl('thumb'),
        ]);
    }
}
