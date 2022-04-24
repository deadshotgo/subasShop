<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function Brand(){
        return $this->belongsTo(Brand::class);
    }
    public function colors(){
        return $this->hasMany(Color::class);
    }
    public function Images(){
        return $this->hasMany(Image::class);
    }
    public function System(){
        return $this->belongsTo(System::class);
    }
    public function Subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
}
