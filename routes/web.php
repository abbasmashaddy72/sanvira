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
    Route::get('', 'FrontendController@index')->name('homepage');
    Route::get('contact_us', 'FrontendController@contact_us')->name('contact_us');
    Route::get('about_us', 'FrontendController@about_us')->name('about_us');
    Route::get('privacy_policy', 'FrontendController@privacy_policy')->name('privacy_policy');
    Route::get('terms_of_use', 'FrontendController@terms_of_use')->name('terms_of_use');
    Route::get('return_refunds', 'FrontendController@return_refunds')->name('return_refunds');

    Route::group(['middleware' => ['verified', 'password.change.check']], function () {
        Route::get('products_sales/{sales_id}', 'FrontendController@products_sales')->name('products_sales');
        Route::get('products_category/{slug}', 'FrontendController@products_category')->name('products_category');
        Route::get('all_products_category', 'FrontendController@all_products_category')->name('all_products_category');
        Route::get('all_products', 'FrontendController@all_products')->name('all_products');
        Route::get('all_brands', 'FrontendController@all_brands')->name('all_brands');
        Route::get('brand_products/{slug}', 'FrontendController@brand_products')->name('brand_products');
        Route::get('products_details/{slug}', 'FrontendController@products_details')->name('products_details');
        Route::get('searchForm', 'FrontendController@searchForm')->name('searchForm');
    });

    Route::get('change-language/{lang}', 'LanguageController@changeLanguage');
});

// Backend Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['web', 'auth', 'verified', 'password.change.check'], 'namespace' => 'App\Http\Controllers\Backend'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('role', 'RoleController@index')->name('role');

    Route::get('user', 'UserController@index')->name('user');
    Route::get('{user}/impersonate', 'UserController@impersonate')->name('users.impersonate');
    Route::get('leave-impersonate', 'UserController@leaveImpersonate')->name('users.leave-impersonate');

    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('profile', 'ProfileController@update')->name('profile.update');
    Route::delete('profile', 'ProfileController@destroy')->name('profile.destroy');

    Route::get('brand', 'BrandController@index')->name('brand');
    Route::get('vendor', 'VendorController@index')->name('vendor');
    Route::get('categories', 'CategoryController@index')->name('categories');
    Route::get('product', 'ProductController@index')->name('product');
    Route::get('product_review', 'ProductController@review')->name('product_review');

    Route::get('enquiry', 'EnquiryController@index')->name('enquiry');
    Route::get('quotation', 'QuotationController@index')->name('quotation');
    Route::get('orders', 'OrderController@index')->name('orders');
    Route::get('delivery_note', 'DeliveryNoteController@index')->name('delivery_note');
    Route::get('invoice', 'InvoiceController@index')->name('invoice');

    Route::get('testimonial', 'TestimonialController@index')->name('testimonial');

    Route::get('homepage', 'StaticController@homepage')->name('homepage');
    Route::get('privacy_policy', 'StaticController@privacy_policy')->name('privacy_policy');
    Route::get('terms_of_use', 'StaticController@terms_of_use')->name('terms_of_use');
    Route::get('return_refunds', 'StaticController@return_refunds')->name('return_refunds');

    Route::get('contact_us', 'StaticController@contact_us')->name('contact_us');

    // Buyer
    Route::get('address', 'AddressController@index')->name('address');

    Route::post('image_upload', 'StaticController@image_upload')->name('ckeditor.upload');
});

require __DIR__ . '/auth.php';
