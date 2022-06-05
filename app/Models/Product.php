<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    static public function scopeSortProduct($request,$count)
    {
        if ($request->orderBy == 'Name:A-Z') {
            $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->orderBy('title')->paginate($count);
            return $products;
        }
        if ($request->orderBy == 'Default') {
            $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->paginate(9);
            return $products;
        }
        if ($request->orderBy == 'Name:Z-A') {
            $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->orderBy('title', 'DESC')->paginate($count);
            return $products;
        }
        if ($request->orderBy == 'Price:High-Low') {
            $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->orderBy('price', 'DESC')->paginate($count);
            return $products;
        }
        if ($request->orderBy == 'Price:Low-High') {
            $products = Product::query()->select(['id', 'title', 'price', 'new_price', 'QTY', 'description', 'images'])->orderBy('price')->paginate($count);
            return $products;
        }

    }

    static public function scopeRelatedProduct(Product $query = null, int $count){
        if($query == null){
            $query = Product::query()->inRandomOrder()->get();
        }else {
            $query = Product::query()->where('category_id', $query->category_id)->inRandomOrder()->get();
        }
        return $query->take($count);
    }


    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function colors()
    {
        return $this->hasMany(Color::class);
    }

    public function Images()
    {
        return $this->hasMany(Image::class);
    }

    public function System()
    {
        return $this->belongsTo(System::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }


}
