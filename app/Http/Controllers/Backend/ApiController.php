<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Country;
use App\Models\Manufacturer;
use App\Models\Supplier;
use App\Models\SupplierProductCategory;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function supplier_categories(Request $request, $parent_id = null)
    {
        $query = SupplierProductCategory::query()->select('id', 'name')
            ->orderBy('name')
            ->when($request->search, function (Builder $query) use ($request) {
                $query->where('name', 'like', "%{$request->search}%");
            })
            ->when($parent_id !== null, function (Builder $query) use ($parent_id) {
                $query->where('parent_id', $parent_id);
            });

        if ($request->exists('selected')) {
            $query->whereIn('id', $request->input('selected', []));
        }

        $data = $query->limit(10)->get();

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

    public function manufacturers(Request $request)
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

    public function countries(Request $request)
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
