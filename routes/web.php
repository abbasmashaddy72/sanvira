<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Frontend URL
Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function () {
    Route::get('/', 'FrontendController@index')->name('homepage'); // Done
    Route::get('contact_us', 'FrontendController@contact_us')->name('contact_us');

    Route::group(['middleware' => ['verified']], function () {
        Route::get('supplier_products_sales/{sales_id}', 'FrontendController@supplier_products_sales')->name('supplier_products_sales'); // Done
        Route::get('products_category/{product_category}', 'FrontendController@products_category')->name('products_category'); // Done
        Route::get('all_products_category', 'FrontendController@all_products_category')->name('all_products_category'); // Done
        Route::get('supplier_profile/{profile}', 'FrontendController@supplier_profile')->name('supplier_profile'); // Done
        Route::get('all_supplier_profile', 'FrontendController@all_supplier_profile')->name('all_supplier_profile'); // Done
        Route::get('products', 'FrontendController@products')->name('products'); // Done
        Route::get('products_details/{data}', 'FrontendController@products_details')->name('products_details'); // Done
    });

    Route::get('/change-language/{lang}', 'LanguageController@changeLanguage');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['web', 'auth', 'verified'], 'namespace' => 'App\Http\Controllers\Backend'], function () {
    Route::get('dashboard', function () {
        view()->share('title', 'Dashboard');
        return view('dashboard');
    })->name('dashboard');

    Route::get('role', 'RoleController@index')->name('role');
    Route::get('user', 'UserController@index')->name('user');

    Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/profile', 'ProfileController@update')->name('profile.update');
    Route::delete('/profile', 'ProfileController@destroy')->name('profile.destroy');

    Route::get('/{user}/impersonate', 'UserController@impersonate')->name('users.impersonate');
    Route::get('/leave-impersonate', 'UserController@leaveImpersonate')->name('users.leave-impersonate');

    Route::get('supplier', 'SupplierController@index')->name('supplier');
    Route::get('supplier_profile/{supplier}', 'SupplierController@supplier_profile')->name('supplier_profile');
    Route::get('contractor', 'ContractorController@index')->name('contractor');
    Route::get('sub-contractor', 'SubContractorController@index')->name('sub-contractor');
    Route::get('homepage', 'StaticController@homepage')->name('homepage');
});

require __DIR__ . '/auth.php';
