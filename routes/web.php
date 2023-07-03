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

// Frontend Routes
Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function () {
    Route::get('/', 'FrontendController@index')->name('homepage');
    Route::get('contact_us', 'FrontendController@contact_us')->name('contact_us');
    Route::get('about_us', 'FrontendController@about_us')->name('about_us');
    Route::get('privacy_policy', 'FrontendController@privacy_policy')->name('privacy_policy');
    Route::get('terms_of_use', 'FrontendController@terms_of_use')->name('terms_of_use');
    Route::get('return_refunds', 'FrontendController@return_refunds')->name('return_refunds');
    Route::get('career', 'FrontendController@career')->name('career');

    Route::group(['middleware' => ['verified']], function () {
        Route::get('supplier_products_sales/{sales_id}', 'FrontendController@supplier_products_sales')->name('supplier_products_sales');
        Route::get('products_category/{product_category}', 'FrontendController@products_category')->name('products_category');
        Route::get('all_products_category', 'FrontendController@all_products_category')->name('all_products_category');
        Route::get('supplier_profile/{profile}', 'FrontendController@supplier_profile')->name('supplier_profile');
        Route::get('all_supplier_profile', 'FrontendController@all_supplier_profile')->name('all_supplier_profile');
        Route::get('all_products', 'FrontendController@all_products')->name('all_products');
        Route::get('all_brands', 'FrontendController@all_brands')->name('all_brands');
        Route::get('brand_products/{brand}', 'FrontendController@brand_products')->name('brand_products');
        Route::get('products_details/{data}', 'FrontendController@products_details')->name('products_details');
        Route::get('searchForm', 'FrontendController@searchForm')->name('searchForm');
    });

    Route::get('/change-language/{lang}', 'LanguageController@changeLanguage');
});

// Backend Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['web', 'auth', 'verified'], 'namespace' => 'App\Http\Controllers\Backend'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('role', 'RoleController@index')->name('role');
    Route::get('user', 'UserController@index')->name('user');

    Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/profile', 'ProfileController@update')->name('profile.update');
    Route::delete('/profile', 'ProfileController@destroy')->name('profile.destroy');

    Route::get('/{user}/impersonate', 'UserController@impersonate')->name('users.impersonate');
    Route::get('/leave-impersonate', 'UserController@leaveImpersonate')->name('users.leave-impersonate');

    Route::get('brand', 'BrandController@index')->name('brand');
    Route::get('manufacturer', 'ManufacturerController@index')->name('manufacturer');

    Route::get('brand-transaction', 'BrandTransactionController@index')->name('brand.transaction');
    Route::get('supplier-transaction', 'SupplierTransactionController@index')->name('supplier.transaction');

    Route::get('supplier', 'SupplierController@index')->name('supplier');
    Route::get('supplier_team_member/{supplier}', 'SupplierController@team_member_index')->name('supplier_team_member');
    Route::get('supplier_certificate/{supplier}', 'SupplierController@certificate_index')->name('supplier_certificate');
    Route::get('supplier_testimonial/{supplier}', 'SupplierController@testimonial_index')->name('supplier_testimonial');
    Route::get('supplier_project/{supplier}', 'SupplierController@project_index')->name('supplier_project');
    Route::get('supplier_product/{supplier}', 'SupplierController@product_index')->name('supplier_product');
    Route::get('supplier_profile/{supplier}', 'SupplierController@supplier_profile')->name('supplier_profile');

    Route::get('supplier-categories', 'SupplierCategoryController@index')->name('supplier-categories');

    Route::get('supplier_report_regular', 'SupplierReportController@supplier_report_regular')->name('supplier_report_regular');
    Route::get('supplier_report_clicks', 'SupplierReportController@supplier_report_clicks')->name('supplier_report_clicks');

    Route::get('contractor', 'ContractorController@index')->name('contractor');

    Route::get('sub-contractor', 'SubContractorController@index')->name('sub-contractor');

    Route::get('homepage', 'StaticController@homepage')->name('homepage');
    Route::get('privacy_policy', 'StaticController@privacy_policy')->name('privacy_policy');
    Route::get('terms_of_use', 'StaticController@terms_of_use')->name('terms_of_use');
    Route::get('return_refunds', 'StaticController@return_refunds')->name('return_refunds');
    Route::get('career', 'StaticController@career')->name('career');
    Route::get('contact_us', 'StaticController@contact_us')->name('contact_us');

    Route::post('image_upload', 'StaticController@image_upload')->name('ckeditor.upload');
});

require __DIR__ . '/auth.php';
