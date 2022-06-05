<?php

namespace App\Http\Controllers;


use App\Models\Color;
use App\Models\Image;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index(Request $request)
    {

        $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->paginate(9);

        $productCount = count($products);

        if (isset($request->orderBy)) {
            $products = Product::scopeSortProduct($request,9);
        }

        if ($request->ajax()) {
            return view('ajax.order', [
                'products' => $products,
            ])->render();
        }


        return view('product.index', [
            'products' => $products,
            'productCount' => $productCount,
        ]);
    }


    public function showProduct($id)
    {

        $product = Product::query()->where('id', $id)->first();

        $images = Image::query()->where('product_id', $id)->get();
        $colors = Color::query()->where('product_id', $id)->get();

        $related = Product::scopeRelatedProduct($product,3);
        return view('product.detal', [
            'product' => $product,
            'images' => $images,
            'colors' => $colors,
            'related' => $related
        ]);
    }

    public function sortByCategory($id, Request $request)
    {

        $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->where('subcategory_id', $id)->paginate(9);

        $productCount = count($products);

        if (isset($request->orderBy)) {
            $products = Product::scopeSortProduct($request,9);
        }


        if ($request->ajax()) {
            return view('ajax.order', [
                'products' => $products,
            ])->render();
        }


        return view('product.sort-category', [

            'products' => $products,
            'id' => $id,
            'count' => $productCount
        ]);

    }


    public function modalProduct(Request $request)
    {

        if (isset($request->id)) {
            $product = Product::query()->select(
                ['id', 'title', 'price', 'new_price', 'description', 'images']
            )->where('id', $request->id)->first();
        }
        if ($request->ajax()) {
            return view('ajax.modalProduct', [
                'product' => $product,
            ])->render();
        }
    }
}
