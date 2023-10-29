<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $files = glob(app_path('Models/*.php'));

        // $modelAttributes = [];

        // foreach ($files as $file) {
        //     $fileName = basename($file, '.php');
        //     $className = 'App\\Models\\' . $fileName;

        //     if (is_subclass_of($className, Model::class)) {
        //         $columns = DB::getSchemaBuilder()->getColumnListing((new $className)->getTable());
        //         $modelAttributes[$className] = $columns;
        //     }
        // }

        // // Print the model attributes in the desired format
        // echo '<ul>';

        // foreach ($modelAttributes as $modelName => $attributes) {
        //     echo '<li>' . $modelName . ':';
        //     echo '<ul>';

        //     foreach ($attributes as $attribute) {
        //         echo '<li>' . $attribute . '</li>';
        //     }

        //     echo '</ul>';
        //     echo '</li>';
        // }

        // echo '</ul>';


        // exit;

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
        $skipColumns = [];

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
