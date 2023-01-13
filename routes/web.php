<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
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
    Route::get('/', 'FrontendController@index')->name('homepage');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['web', 'auth', 'verified'], 'namespace' => 'App\Http\Controllers'], function () {
});
Route::get('/change-language/{lang}', [LanguageController::class, 'changeLanguage']);

Route::get('/dashboard', function () {
    view()->share('title', 'Dashboard');
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/{user}/impersonate', 'UsersController@impersonate')->name('users.impersonate');
    Route::get('/leave-impersonate', 'UsersController@leaveImpersonate')->name('users.leave-impersonate');
});

require __DIR__ . '/auth.php';
