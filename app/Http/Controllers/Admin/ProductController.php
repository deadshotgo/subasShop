<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\System;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
       return view('admin.products.product',[
           'products' => $products,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function MyCreate($id)
    {
        $category = Category::query()->where('id', $id)->first();
        $sub_category = Subcategory::query()->where('category_id', $id)->get();
        $brand = Brand::query()->orderBy('name')->get();
         $system = System::query()->orderBy('title')->get();
        return view('admin.products.create',[
             'category' => $category,
            'sub_category' => $sub_category,
            'brand' => $brand,
            'system' => $system,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $new_product = new Product();
            $new_product->title = $request->title;
            $new_product->QTY = $request->QTY;
            $new_product->price = $request->price;
            $new_product->images = $request->feature_image;
            $new_product->description = $request->description;
            $new_product->information = $request->information;
            if ($request->brand_id != null) {
                $new_product->brand_id = $request->brand_id;
            }
            $new_product->subcategory_id = $request->sub_category_id;
            $new_product->system_id = $request->system_id;
            $new_product->category_id = $request->category_id;
            $new_product->save();

            return redirect()->to(route('Product.show',$new_product->id));
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Не вірно введені данні');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::query()->where('id', $id)->first();
        $imgProd = Image::query()->where('product_id', $id)->get();
        $colorProd = Color::query()->where('product_id', $id)->get();
        return view('admin.products.showProd',[
            'product' => $product,
            'imgProd' => $imgProd,
            'colorProd' => $colorProd,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::query()->where('id', $id)->first();
        $sub_category = Subcategory::query()->where('category_id', $product->category->id)->get();
        $brand = Brand::query()->orderBy('name')->get();
        $system = System::query()->orderBy('title')->get();

        return view('admin.products.edit',[
            'product' => $product,
            'sub_categories' =>$sub_category,
            'brand' => $brand,
            'system' => $system

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Product::query()->where('id',$id)->first();
        $update->title = $request->title;
        $update->QTY = $request->QTY;
        $update->price = $request->price;
        $update->images = $request->feature_image;
        $update->description = $request->description;
        $update->information = $request->information;
        $update->brand_id = $request->brand_id;
        $update->subcategory_id = $request->sub_category_id;
        $update->system_id = $request->system_id;
        $update->category_id = $request->category_id;
        $update->save();
        return redirect()->back()->with('message', 'Продукт було успішно відредаговано');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Product::where('id',$id)->first();
        $destroy->delete();
        return redirect()->back()->with('message', 'Продукт було успішно видалено');
    }
}
