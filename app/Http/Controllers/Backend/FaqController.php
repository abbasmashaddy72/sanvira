<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class FaqController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Faq');
    }

    public function index()
    {
        abort_if(Gate::denies('faq_list'), 403);

        return view('pages.backend.faq.index');
    }
}
