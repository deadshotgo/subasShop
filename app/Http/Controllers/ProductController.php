<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\System;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()->select(['id', 'title'])->limit(4)->get();
        $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->paginate(9);
        $brands = Brand::query()->select(['id', 'name'])->get();
        $systems = System::query()->select(['id', 'title'])->get();


        if (isset($request->orderBy)) {
            if ($request->orderBy == 'Name:A-Z') {
                $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->orderBy('title')->paginate(9);

            }
            if ($request->orderBy == 'Name:Z-A') {
                $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->orderBy('title', 'DESC')->paginate(9);

            }
            if ($request->orderBy == 'Price:High-Low') {
                $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->orderBy('price', 'DESC')->paginate(9);

            }
            if ($request->orderBy == 'Price:Low-High') {
                $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->orderBy('price')->paginate(9);

            }

        }

        if ($request->ajax()) {
            return view('ajax.order', [
                'products' => $products,
            ])->render();
        }


        return view('product.index', [
            'categories' => $categories,
            'products' => $products,
            'brands' => $brands,
            'systems' => $systems,
        ]);
    }

    public function sortByCategory($id, Request $request)
    {
        $categories = Category::query()->select(['id', 'title'])->limit(4)->get();
        $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->where('subcategory_id', $id)->paginate(9);
        $brands = Brand::query()->select(['id', 'name'])->get();
        $systems = System::query()->select(['id', 'title'])->get();


        if (isset($request->orderBy)) {
            if ($request->orderBy == 'Name:A-Z') {
                $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->where('subcategory_id', $id)->orderBy('title')->paginate(9);

            }
            if ($request->orderBy == 'Name:Z-A') {
                $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->where('subcategory_id', $id)->orderBy('title', 'DESC')->paginate(9);

            }
            if ($request->orderBy == 'Price:High-Low') {
                $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->where('subcategory_id', $id)->orderBy('price', 'DESC')->paginate(9);

            }
            if ($request->orderBy == 'Price:Low-High') {
                $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->where('subcategory_id', $id)->orderBy('price')->paginate(9);

            }

        }

        if ($request->ajax()) {
            return view('ajax.order', [
                'products' => $products,
            ])->render();
        }


        return view('product.sort-category', [
            'categories' => $categories,
            'products' => $products,
            'brands' => $brands,
            'systems' => $systems,
            'id' => $id,
        ]);

    }


    public function modalProduct(Request $request)
    {

        if(isset($request->id)) {
                $product = Product::query()->select(
                    ['id', 'title', 'price', 'new_price','description', 'images']
                )->where('id', $request->id)->first();
        }
        if ($request->ajax()) {
            return view('ajax.modalProduct', [
                'product' => $product,
            ])->render();
        }
    }
}
