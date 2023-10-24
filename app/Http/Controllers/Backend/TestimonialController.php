<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class TestimonialController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Testimonial');
    }

    public function index()
    {
        abort_if(Gate::denies('testimonial_list'), 403);
        if (auth()->user()->roles->first()->slug == 'testimonial_list') {
            abort(403);
        }

        return view('pages.backend.testimonial.index');
    }
}
