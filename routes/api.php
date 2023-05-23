<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api.admin.', 'namespace' => 'App\Http\Controllers\Backend'], function () {
    Route::get('supplier_categories', 'ApiController@supplier_categories')->name('supplier_categories');
    Route::get('brands', 'ApiController@brands')->name('brands');
    Route::get('manufacturers', 'ApiController@manufacturers')->name('manufacturers');
    Route::get('countries', 'ApiController@countries')->name('countries');
});
