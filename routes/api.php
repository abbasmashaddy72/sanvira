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
    Route::get('categories/{parent_id?}', 'ApiController@categories')->name('categories');
    Route::get('users', 'ApiController@users')->name('users');
    Route::get('brands', 'ApiController@brands')->name('brands');
    Route::get('vendors', 'ApiController@vendors')->name('vendors');
    Route::get('countries', 'ApiController@countries')->name('countries');
    Route::get('states', 'ApiController@states')->name('states');
    Route::get('cities', 'ApiController@cities')->name('cities');
});
