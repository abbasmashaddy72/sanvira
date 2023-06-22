<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class SupplierReportController extends Controller
{
    public function supplier_report_regular()
    {
        abort_if(Gate::denies('supplier_report_regular'), 403);
        view()->share('title', 'Supplier Report Regular');

        return view('pages.backend.supplier-reports.regular');
    }

    public function supplier_report_clicks()
    {
        abort_if(Gate::denies('supplier_report_clicks'), 403);
        view()->share('title', 'Supplier Report Clicks');

        return view('pages.backend.supplier-reports.clicks');
    }
}
