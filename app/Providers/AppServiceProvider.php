<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\System;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('vendor.pagination.bootstrap-4');
        $categories = Category::query()->select(['id', 'title'])->limit(4)->get();
        $brands = Brand::query()->select(['id', 'name'])->get();
        $relModalProducts = Product::scopeRelatedProduct(null,3);
        $systems = System::query()->select(['id', 'title'])->get();
        view()->share(['brands' => $brands,
                        'systems' => $systems,
                        'relModalProducts' => $relModalProducts,
                       'categories' => $categories]);

    }
}
