<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
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
}
