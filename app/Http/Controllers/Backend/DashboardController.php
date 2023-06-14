<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Contractor;
use App\Models\Manufacturer;
use App\Models\SubContractor;
use App\Models\Supplier;
use App\Models\SupplierBrandView;
use App\Models\SupplierManufacturerView;
use App\Models\SupplierProduct;
use App\Models\SupplierProductCategoryView;
use App\Models\SupplierProductView;
use App\Models\SupplierTestimonial;
use App\Models\SupplierTransaction;
use App\Models\SupplierView;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Colors\RandomColor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dashboard'), 403);

        view()->share('title', 'Dashboard');

        if (auth()->user()->roles->first()->slug == 'supplier') {
            return $this->supplierDashboard();
        } elseif (auth()->user()->roles->first()->slug == 'sub_contractor') {
            return $this->subContractorDashboard();
        } elseif (auth()->user()->roles->first()->slug == 'contractor') {
            return $this->contractorDashboard();
        } elseif (auth()->user()->roles->first()->slug == 'super_admin') {
            return $this->adminDashboard();
        } else {
            return view('dashboard');
        }
    }

    private function adminDashboard()
    {
        $suppliers_count = Supplier::count();
        $contractors_count = Contractor::count();
        $subContractor_count = SubContractor::count();
        $brands_count = Brand::count();
        $manufactures_count = Manufacturer::count();
        $supplier_data = $this->getFilledPartialsRows('Supplier');

        return view('pages.backend.admin_dashboard', compact([
            'suppliers_count',
            'contractors_count',
            'subContractor_count',
            'brands_count',
            'manufactures_count',
            'supplier_data',
        ]));
    }

    private function supplierDashboard()
    {
        $supplier = Supplier::where('user_id', auth()->user()->id)->first();
        $supplierTransaction = SupplierTransaction::where('supplier_id', $supplier->id)->first();
        $supplierProductsCount = SupplierProduct::where('supplier_id', $supplier->id)->count();
        $supplierProductCategoryCount = SupplierProduct::where('supplier_id', $supplier->id)->distinct('supplier_product_category_id')->count();
        $supplierProductBrandCount = SupplierProduct::where('supplier_id', $supplier->id)->distinct('brand_id')->count();
        $supplierProductManufacturerCount = SupplierProduct::where('supplier_id', $supplier->id)->distinct('manufacturer_id')->count();
        $supplierProduct_data = $this->getFilledPartialsRows('SupplierProduct', $supplier->id);
        $supplierRatingSum = SupplierTestimonial::where('supplier_id', $supplier->id)->sum('rating');
        $supplierRatingCount = SupplierTestimonial::where('supplier_id', $supplier->id)->count();
        $supplierRating = $supplierRatingCount > 0 ? round($supplierRatingSum / $supplierRatingCount, 2) : 0;
        $categoryViews = SupplierProductCategoryView::where('supplier_id', $supplier->id)->groupBy('supplier_product_category_id')
            ->select('supplier_product_category_id', DB::raw('SUM(clicks) as total_clicks'))->with('supplierProductCategory')->get();
        $categoryViewsChart = $categoryViews->reduce(
            function ($columnChartModel, $data) {
                $type = $data->supplierProductCategory->name;
                $value = $data->total_clicks;
                $color = RandomColor::one(['luminosity' => 'dark', 'format' => 'hex']);

                return $columnChartModel->addColumn($type, $value, $color);
            },
            LivewireCharts::columnChartModel()
                ->setAnimated(true)
                ->withOnColumnClickEventName('onColumnClick')
                ->setLegendVisibility(false)
                ->setDataLabelsEnabled(true)
                ->setOpacity(0.75)
                ->setColumnWidth(50)
                ->withGrid()
        );
        $productViews = SupplierProductView::where('supplier_id', $supplier->id)->groupBy('supplier_product_id')
            ->select('supplier_product_id', DB::raw('SUM(clicks) as total_clicks'))->with('supplierProduct')->get();
        $productViewsChart = $productViews->reduce(
            function ($columnChartModel, $data) {
                $type = $data->supplierProduct->name;
                $value = $data->total_clicks;
                $color = RandomColor::one(['luminosity' => 'dark', 'format' => 'hex']);

                return $columnChartModel->addColumn($type, $value, $color);
            },
            LivewireCharts::columnChartModel()
                ->setAnimated(true)
                ->withOnColumnClickEventName('onColumnClick')
                ->setLegendVisibility(false)
                ->setDataLabelsEnabled(true)
                ->setOpacity(0.75)
                ->setColumnWidth(50)
                ->withGrid()
        );
        $profileViews = SupplierView::select(
            'supplier_id',
            DB::raw('SUM(clicks) as total_clicks'),
            DB::raw('Year(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('MONTHNAME(created_at) as month_name'),
            DB::raw('WEEK(created_at) - WEEK(DATE_SUB(created_at, INTERVAL DAYOFMONTH(created_at) - 1 DAY)) + 1 as week'),
        )
            ->where('supplier_id', $supplier->id)
            ->groupBy('supplier_id', DB::raw('Year(created_at)'), DB::raw('MONTH(created_at)'), DB::raw('MONTHNAME(created_at)'), DB::raw('WEEK(created_at) - WEEK(DATE_SUB(created_at, INTERVAL DAYOFMONTH(created_at) - 1 DAY)) + 1'))
            ->get();
        // $profileViewsChart = $profileViews->reduce(
        //     function ($columnChartModel, $data) {
        //         $type = $data->month_name . ', Week: ' . $data->week;
        //         $value = $data->total_clicks;
        //         $color = RandomColor::one(['luminosity' => 'dark', 'format' => 'hex']);

        //         return $columnChartModel->addColumn($type, $value, $color);
        //     },
        //     LivewireCharts::columnChartModel()
        //         ->setAnimated(true)
        //         ->setLegendVisibility(false)
        //         ->setDataLabelsEnabled(true)
        //         ->setOpacity(0.75)
        //         ->setColumnWidth(50)
        //         ->withGrid()
        // );
        $brandViews = SupplierBrandView::where('supplier_id', $supplier->id)->groupBy('brand_id')
            ->select('brand_id', DB::raw('SUM(clicks) as total_clicks'))->with('brand')->get();
        $brandViewsChart = $brandViews->reduce(
            function ($columnChartModel, $data) {
                $type = $data->brand->name;
                $value = $data->total_clicks;
                $color = RandomColor::one(['luminosity' => 'dark', 'format' => 'hex']);

                return $columnChartModel->addColumn($type, $value, $color);
            },
            LivewireCharts::columnChartModel()
                ->setAnimated(true)
                ->withOnColumnClickEventName('onColumnClick')
                ->setLegendVisibility(false)
                ->setDataLabelsEnabled(true)
                ->setOpacity(0.75)
                ->setColumnWidth(50)
                ->withGrid()
        );
        $manufacturerViews = SupplierManufacturerView::where('supplier_id', $supplier->id)->groupBy('manufacturer_id')
            ->select('manufacturer_id', DB::raw('SUM(clicks) as total_clicks'))->with('manufacturer')->get();
        $manufacturerViewsChart = $manufacturerViews->reduce(
            function ($columnChartModel, $data) {
                $type = $data->manufacturer->name;
                $value = $data->total_clicks;
                $color = RandomColor::one(['luminosity' => 'dark', 'format' => 'hex']);

                return $columnChartModel->addColumn($type, $value, $color);
            },
            LivewireCharts::columnChartModel()
                ->setAnimated(true)
                ->withOnColumnClickEventName('onColumnClick')
                ->setLegendVisibility(false)
                ->setDataLabelsEnabled(true)
                ->setOpacity(0.75)
                ->setColumnWidth(50)
                ->withGrid()
        );
        $profileViewsChart = $profileViews->reduce(
            function ($columnChartModel, $data) {
                $type = $data->month_name . ', Week: ' . $data->week;
                $value = $data->total_clicks;

                return $columnChartModel->addPoint($type, $value);
            },
            LivewireCharts::lineChartModel()
                ->setAnimated(true)
                ->setLegendVisibility(false)
                ->setDataLabelsEnabled(true)
                ->setSmoothCurve()
                ->setXAxisVisible(true)
            // ->setOpacity(0.75)
            // ->setColumnWidth(50)
                ->withGrid()
        );
        // echo '<pre>';
        // print_r($categoryViewsChart);
        // echo '</pre>';
        // exit;

        return view('pages.backend.supplier.dashboard', compact([
            'supplierTransaction',
            'supplierProductsCount',
            'supplierProductCategoryCount',
            'supplierProductBrandCount',
            'supplierProductManufacturerCount',
            'supplierProduct_data',
            'supplierRating',
            'categoryViewsChart',
            'productViewsChart',
            'profileViewsChart',
            'brandViewsChart',
            'manufacturerViewsChart',
        ]));
    }

    private function subContractorDashboard()
    {
        return view('pages.backend.sub-contractor.dashboard');
    }

    private function contractorDashboard()
    {
        return view('pages.backend.contractor.dashboard');
    }

    private function getFilledPartialsRows($model, $where = null)
    {
        $model = '\\App\\Models\\' . $model;
        if ($where != null) {
            $allIds = $model::where('supplier_id', $where)->pluck('id')->toArray();
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
