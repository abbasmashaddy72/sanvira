<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
}
