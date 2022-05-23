<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class OtheController extends Controller
{
    // ****** views controllers
   public function addToProd(){

       $categories = Category::all();
       return view('admin.products.catToProd',[
           'categories' => $categories
       ]);

   }

   public function prodImg($id) {
       $prod = Product::query()->where('id',$id)->first();
       $images = Image::query()->where('product_id',$prod->id)->get();
       $colors = Color::query()->where('product_id', $prod->id)->get();
       return view('admin.products.images',[
           'prod' => $prod,
           'images' => $images,
           'colors' => $colors,
       ]);

   }
   // ********* end views

   // ********** store controllers
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
    // ************

    // ************ destroy images for product
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
    // ************


}
