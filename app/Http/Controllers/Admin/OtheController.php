<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class OtheController extends Controller
{
   public function addToProd(){

       $categories = Category::all();
       return view('admin.products.catToProd',[
           'categories' => $categories
       ]);

   }
}
