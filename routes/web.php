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

Route::get('/',
    'App\Http\Controllers\HomeController@index'
)->name('/');

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
    Route::group(['prefix' => 'Admin-panel'], function () {
        Route::resource('Category',Admin\CategoryController::class);
        Route::resource('SubCategory',Admin\SubCategoryController::class);
        Route::resource('Brand',Admin\BrandController::class);
        Route::resource('System',Admin\SystemController::class);
        Route::resource('Product',Admin\ProductController::class);

        // ******** ProdOption controllers
        Route::get('/Create-Prod-Cat_id/{id}/',
            'App\Http\Controllers\Admin\ProductController@MyCreate'
        )->name('/create-prod');

        Route::get('/Product-by-Сategory/',
            'App\Http\Controllers\Admin\ProdOptionController@addProdByCat'
        )->name('/cat-to-prod');
        Route::get(
            '/Prod-Option/{id}',
            'App\Http\Controllers\Admin\ProdOptionController@productOption'
        )->name('/prod-images');
        Route::get(
            '/Product-by-Category/{id}',
            'App\Http\Controllers\Admin\ProdOptionController@searchByCat'
        )->name('/search-prod');
        Route::get(
            '/Product-by-Brand/{id}',
            'App\Http\Controllers\Admin\ProdOptionController@searchByBrand'
        )->name('/search-prod-brand');
        Route::get(
            '/Product-by-System/{id}',
            'App\Http\Controllers\Admin\ProdOptionController@searchBySystem'
        )->name('/search-prod-system');


        Route::post(
            '/save-images/',
            'App\Http\Controllers\Admin\ProdOptionController@storeImages'
        )->name('/save-images');
        Route::post(
            '/Save-Color/',
            'App\Http\Controllers\Admin\ProdOptionController@storeColor'
        )->name('/save-color');

        Route::delete(
            '/Delete-Prod-Images/{id}',
            'App\Http\Controllers\Admin\ProdOptionController@destroyImages'
        )->name('/delete-images');
        Route::delete(
            '/Delete-Color/{id}',
            'App\Http\Controllers\Admin\ProdOptionController@destroyColors'
        )->name('/delete-color');

        // ******* end ProdOption controllers

        Route::get('/Sub-Cat/{id}',
            'App\Http\Controllers\Admin\SubCategoryController@MyCreate'
        )->name('/sub_cat_create');

    });

    Route::get('/admin-home', function () {
        return view('admin.index');
    })->name('/admin-home');

});


Auth::routes();

