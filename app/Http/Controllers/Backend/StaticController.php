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
