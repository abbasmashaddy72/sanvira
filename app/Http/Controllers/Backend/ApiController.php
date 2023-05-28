<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\Brand;
use App\Models\Country;
use App\Models\Manufacturer;
use App\Models\Supplier;
use App\Models\SupplierProductCategory;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function supplier_categories(Request $request)
    {
        $data = SupplierProductCategory::query()->select('id', 'name')
            ->orderBy('name')
            ->when($request->search, fn (Builder $query) => $query->where('name', 'like', "%{$request->search}%"))
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();

        return $data;
    }

    public function brands(Request $request)
    {
        $data = Brand::query()->select('id', 'name')
            ->orderBy('name')
            ->when($request->search, fn (Builder $query) => $query->where('name', 'like', "%{$request->search}%"))
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();

        return $data;
    }

    public function suppliers(Request $request)
    {
        $data = Supplier::query()->select('id', 'company_name')
            ->orderBy('company_name')
            ->when($request->search, fn (Builder $query) => $query->where('company_name', 'like', "%{$request->search}%"))
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();

        return $data;
    }

    public function  manufacturers(Request $request)
    {
        $data = Manufacturer::query()->select('id', 'name')
            ->orderBy('name')
            ->when($request->search, fn (Builder $query) => $query->where('name', 'like', "%{$request->search}%"))
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();

        return $data;
    }

    public function  countries(Request $request)
    {
        $data = Country::query()->select('id', 'name')
            ->orderBy('name')
            ->when($request->search, fn (Builder $query) => $query->where('name', 'like', "%{$request->search}%"))
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();

        return $data;
    }
}
