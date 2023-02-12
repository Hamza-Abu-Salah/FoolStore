<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getimageAttribute($value) {
        return 'storage/products/' . $value;
    }

    public function store() {
        return $this->belongsTo(Product::class, 'store_id');
    }

    public function category() {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
