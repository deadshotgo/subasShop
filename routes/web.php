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
        Route::resource('Product',Admin\ProductController::class);
        // ******** creat controllers

        Route::get('/sub-cat/{id}',
            'App\Http\Controllers\Admin\SubCategoryController@MyCreate')->name('/sub_cat_create');
        Route::get('/create-prod-cat_id/{id}/',
            'App\Http\Controllers\Admin\ProductController@MyCreate')->name('/create-prod');

        // ******* end controllers
        // ********* view controller

        Route::get('/cat-to-prod/',
            'App\Http\Controllers\Admin\OtheController@addToProd')->name('/cat-to-prod');

        Route::get(
            '/prod-images/{id}',
            'App\Http\Controllers\Admin\OtheController@prodImg')->name('/prod-images');

        // ******** end view
        // ******** save controllers

        Route::post(
            '/save-prod-img/',
            'App\Http\Controllers\Admin\OtheController@storeImages')->name('/save-images');
        Route::post(
            '/save-prod-color/',
            'App\Http\Controllers\Admin\OtheController@storeColor')->name('/save-color');

        // ********* end save
        // ********* destroy contrpollers

        Route::delete(
            '/delete-prod-images/{id}',
            'App\Http\Controllers\Admin\OtheController@destroyImages')->name('/delete-images');
        Route::delete(
            '/delete-prod-color/{id}',
            'App\Http\Controllers\Admin\OtheController@destroyColors')->name('/delete-color');

        // ********* end destroy

    });

    Route::get('/admin-home', function () {
        return view('admin.index');
    })->name('/admin-home');

});


Auth::routes();

