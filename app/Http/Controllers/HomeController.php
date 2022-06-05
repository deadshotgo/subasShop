<?php

namespace App\Http\Controllers;

use App\Models\Brand;

use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
$brandCours = Brand::query()->select(['id','name','images'])->get();
        $randProducts = Product::scopeRelatedProduct(null,6);
        $oldproducts = Product::query()->select(['id','title','price','QTY','new_price','description','images'])->orderBy('created_at','DESC')->limit(8)->get();
        $newProducts = Product::query()->select(['id','title','price','new_price','QTY','description','images'])->limit(8)->get();
        return view('index',[

            'randProducts' => $randProducts,
            'oldproducts' => $oldproducts,
            'newProducts' => $newProducts,
            'brandCours' => $brandCours,
        ]);
    }
}
