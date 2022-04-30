<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class OtheController extends Controller
{
   public function addToProd(){

       $categories = Category::all();
       return view('admin.products.catToProd',[
           'categories' => $categories
       ]);

   }

   public function prodImg($id) {
       $prod = Product::query()->where('id',$id)->first();
       $images = Image::query()->where('product_id',$prod->id)->get();
       return view('admin.products.images',[
           'prod' => $prod,
           'images' => $images
       ]);

   }

}
