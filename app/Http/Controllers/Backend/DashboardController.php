<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dashboard'), 403);

        view()->share('title', 'Dashboard');

        if (auth()->user()->roles->first()->slug == 'super_admin') {
            return $this->adminDashboard();
        }
        return view('dashboard');
    }

    private function adminDashboard()
    {
        $product_count = Product::count();
        $brands_count = Brand::count();
        $vendors_count = Vendor::count();
        $products_data = $this->getFilledPartialsRows('Product');

        return view('pages.backend.admin_dashboard', compact([
            'product_count',
            'brands_count',
            'vendors_count',
            'products_data',
        ]));
    }

    private function getFilledPartialsRows($model, $where = null, $column = null)
    {
        $model = '\\App\\Models\\' . $model;
        if ($where != null & $column != null) {
            $allIds = $model::where($column, $where)->pluck('id')->toArray();
        } else {
            $allIds = $model::pluck('id')->toArray();
        }

        $filledRows = [];
        $emptyRows = [];
        $skipColumns = ['price', 'min_price', 'max_price'];

        foreach ($allIds as $id) {
            $model = $model::find($id);

            if (!$model) {
                continue;
            }
            $columns = $model->getFillable();

            $isFullyFilled = true;

            foreach ($columns as $column) {
                if (in_array($column, $skipColumns)) {
                    continue;
                }

                if ($model->$column === null || $model->$column === '') {
                    $isFullyFilled = false;
                    break;
                }
            }

            if ($isFullyFilled) {
                $filledRows[] = $id;
            } else {
                $emptyRows[] = $id;
            }
        }

        return ['filledRows' => $filledRows, 'emptyRows' => $emptyRows];
    }
}
