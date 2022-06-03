<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::query()->select(['id','title'])->limit(4)->get();
        $brands = Brand::query()->select(['id','name'])->get();
        $randProducts = Product::query()->select(['id','title','price','QTY','new_price','description','images'])->get()->random(5);
        $oldproducts = Product::query()->select(['id','title','price','QTY','new_price','description','images'])->orderBy('created_at','DESC')->limit(8)->get();
        $newProducts = Product::query()->select(['id','title','price','new_price','QTY','description','images'])->limit(8)->get();
        return view('index',[
            'categories' => $categories,
            'brands' => $brands,
            'randProducts' => $randProducts,
            'oldproducts' => $oldproducts,
            'newProducts' => $newProducts
        ]);
    }
}
