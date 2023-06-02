<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Support\Facades\Gate;

class SupplierController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Supplier');
    }

    public function index()
    {
        abort_if(Gate::denies('supplier_list'), 403);

        return view('pages.backend.supplier.index');
    }

    public function supplier_profile(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_profile_view'), 403);
        if ($supplier->user_id != auth()->user()->id && auth()->user()->roles->first()->slug == 'supplier') {
            abort(404);
        }
        view()->share('title', $supplier->company_name);
        $supplier->with('manager');

        if (auth()->check() && auth()->user()->hasRole('supplier')) {
            $supplier_profile = true;
            $team_member_index = false;
            $certificate_index = false;
            $testimonial_index = false;
            $project_index = false;
            $product_index = false;
        } else {
            $supplier_profile = true;
            $team_member_index = true;
            $certificate_index = true;
            $testimonial_index = true;
            $project_index = true;
            $product_index = true;
        }

        return view('pages.backend.supplier.profile', compact([
            'supplier',
            'supplier_profile',
            'team_member_index',
            'certificate_index',
            'testimonial_index',
            'project_index',
            'product_index',
        ]));
    }

    public function team_member_index(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_team_member_list'), 403);
        if ($supplier->user_id != auth()->user()->id && auth()->user()->roles->first()->slug == 'supplier') {
            abort(404);
        }
        if (auth()->check() && auth()->user()->hasRole('supplier')) {
            $supplier_profile = false;
            $team_member_index = true;
            $certificate_index = false;
            $testimonial_index = false;
            $project_index = false;
            $product_index = false;
        } else {
            $supplier_profile = true;
            $team_member_index = true;
            $certificate_index = true;
            $testimonial_index = true;
            $project_index = true;
            $product_index = true;
        }

        return view('pages.backend.supplier.profile', compact([
            'supplier',
            'supplier_profile',
            'team_member_index',
            'certificate_index',
            'testimonial_index',
            'project_index',
            'product_index',
        ]));
    }

    public function certificate_index(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_certificate_list'), 403);
        if ($supplier->user_id != auth()->user()->id && auth()->user()->roles->first()->slug == 'supplier') {
            abort(404);
        }
        if (auth()->check() && auth()->user()->hasRole('supplier')) {
            $supplier_profile = false;
            $team_member_index = false;
            $certificate_index = true;
            $testimonial_index = false;
            $project_index = false;
            $product_index = false;
        } else {
            $supplier_profile = true;
            $team_member_index = true;
            $certificate_index = true;
            $testimonial_index = true;
            $project_index = true;
            $product_index = true;
        }

        return view('pages.backend.supplier.profile', compact([
            'supplier',
            'supplier_profile',
            'team_member_index',
            'certificate_index',
            'testimonial_index',
            'project_index',
            'product_index',
        ]));
    }

    public function testimonial_index(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_testimonial_list'), 403);
        if ($supplier->user_id != auth()->user()->id && auth()->user()->roles->first()->slug == 'supplier') {
            abort(404);
        }
        if (auth()->check() && auth()->user()->hasRole('supplier')) {
            $supplier_profile = false;
            $team_member_index = false;
            $certificate_index = false;
            $testimonial_index = true;
            $project_index = false;
            $product_index = false;
        } else {
            $supplier_profile = true;
            $team_member_index = true;
            $certificate_index = true;
            $testimonial_index = true;
            $project_index = true;
            $product_index = true;
        }

        return view('pages.backend.supplier.profile', compact([
            'supplier',
            'supplier_profile',
            'team_member_index',
            'certificate_index',
            'testimonial_index',
            'project_index',
            'product_index',
        ]));
    }

    public function project_index(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_project_list'), 403);
        if ($supplier->user_id != auth()->user()->id && auth()->user()->roles->first()->slug == 'supplier') {
            abort(404);
        }
        if (auth()->check() && auth()->user()->hasRole('supplier')) {
            $supplier_profile = false;
            $team_member_index = false;
            $certificate_index = false;
            $testimonial_index = false;
            $project_index = true;
            $product_index = false;
        } else {
            $supplier_profile = true;
            $team_member_index = true;
            $certificate_index = true;
            $testimonial_index = true;
            $project_index = true;
            $product_index = true;
        }

        return view('pages.backend.supplier.profile', compact([
            'supplier',
            'supplier_profile',
            'team_member_index',
            'certificate_index',
            'testimonial_index',
            'project_index',
            'product_index',
        ]));
    }

    public function product_index(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_product_list'), 403);
        if ($supplier->user_id != auth()->user()->id && auth()->user()->roles->first()->slug == 'supplier') {
            abort(404);
        }
        if (auth()->check() && auth()->user()->hasRole('supplier')) {
            $supplier_profile = false;
            $team_member_index = false;
            $certificate_index = false;
            $testimonial_index = false;
            $project_index = false;
            $product_index = true;
        } else {
            $supplier_profile = true;
            $team_member_index = true;
            $certificate_index = true;
            $testimonial_index = true;
            $project_index = true;
            $product_index = true;
        }

        return view('pages.backend.supplier.profile', compact([
            'supplier',
            'supplier_profile',
            'team_member_index',
            'certificate_index',
            'testimonial_index',
            'project_index',
            'product_index',
        ]));
    }
}
