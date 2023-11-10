<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class EnquiryController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Enquiry');
    }

    public function index()
    {
        abort_if(Gate::denies('enquiry_list'), 403);

        return view('pages.backend.enquiry.index');
    }

    public function add()
    {
        abort_if(Gate::denies('enquiry_add'), 403);
        view()->share('title', 'Enquiry Add');

        return view('pages.backend.enquiry.add_edit');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('enquiry_edit'), 403);
        view()->share('title', 'Enquiry Edit');

        return view('pages.backend.enquiry.add_edit', compact('id'));
    }
}
