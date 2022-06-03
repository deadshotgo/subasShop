<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProdOptionController extends Controller
{
  // ** view method
    public function addProdByCat()
    {

        $categories = Category::query()->select('id','title','show','created_at')->get();
        return view('admin.products.include.catToProd', [
            'categories' => $categories
        ]);

    }

    public function searchByCat($id)
    {

        $products = Product::query()->select('id','title','price','category_id','system_id','brand_id','QTY')->where('category_id', $id)->get();
        return view('admin.products.include.search', [
            'products' => $products,

        ]);

    }

    public function searchByBrand($id)
    {

    $products = Product::query()->select('id','title','price','category_id','system_id','brand_id','QTY')->where('brand_id', $id)->get();
    return view('admin.products.include.search', [
        'products' => $products,
    ]);

    }

    public function searchBySystem($id)
    {

        $products = Product::query()->select('id','title','price','category_id','system_id','brand_id','QTY')->where('system_id', $id)->get();
        return view('admin.products.include.search', [
            'products' => $products,
        ]);

    }


    public function productOption($id)
    {
        $prod = Product::query()->where('id', $id)->first();
        $images = Image::query()->where('product_id', $prod->id)->get();
        $colors = Color::query()->where('product_id', $prod->id)->get();
        return view('admin.products.images', [
            'prod' => $prod,
            'images' => $images,
            'colors' => $colors,
        ]);

    }
  // ** end view method

  // *** store method
    public function storeImages(Request $request)
    {
        try {
            $new_image = new Image();
            $new_image->path = $request->feature_image;
            $new_image->product_id = $request->prod_id;
            $new_image->save();
            return redirect()->back()->with('message', 'Картинку збережено');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Не вірно введені данні');
        }
    }

    public function storeColor(Request $request)
    {
        try {
            $new_image = new Color();
            $new_image->color = $request->color;
            $new_image->product_id = $request->prod_id;
            $new_image->save();
            return redirect()->back()->with('message', 'Колір збережено');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Не вірно введені данні');
        }
    }
 // *** end store method

 // **** destroy method
    public function destroyImages($id)
    {
        $delete = Image::where('id',$id)->first();
        $delete->delete();
        return redirect()->back()->with('message', 'картинку було успішно видалено');
    }
    public function destroyColors($id)
    {
        $delete = Color::where('id',$id)->first();
        $delete->delete();
        return redirect()->back()->with('message', 'колір було успішно видалено');
    }
 // **** end destroy method
}
