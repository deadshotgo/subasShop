<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function System(){
        return $this->belongsTo(System::class);
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
}
