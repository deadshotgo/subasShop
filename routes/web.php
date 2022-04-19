<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
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

$path = '\App\Http\Controllers';


Route::get('/', function () {
    return view('index');
})->name('/');

Route::get('/shop', function () {
    return view('product.index');
})->name('/shop');

Route::get('/blog', function () {
    return view('blog.index');
})->name('/blog');

Route::get('/blog-det', function () {
    return view('blog.details-blog');
})->name('/blog-det');

Route::get('/about', function () {
    return view('about.index');
})->name('/about');

Route::get('/contact', function () {
    return view('contact');
})->name('/contact');


Route::get('/det-prod', function () {
    return view('product.detal');
})->name('/det-prod');


Route::group(['middleware' => ['role:admin']], function () {
    Route::group(['prefix' => 'Admin'], function () {
        Route::resource('Category',Admin\CategoryController::class);
        Route::resource('SubCategory',Admin\SubCategoryController::class);
        Route::resource('Brand',Admin\BrandController::class);
        Route::resource('System',Admin\SystemController::class);
        Route::get('/sub-cat/{id}',
            'App\Http\Controllers\Admin\SubCategoryController@myCreate')->name('/sub_cat_create');
    });

    Route::get('/admin-home', function () {
        return view('admin.index');
    })->name('/admin-home');

});


Auth::routes();

