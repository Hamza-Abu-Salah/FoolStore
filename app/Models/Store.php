<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Store extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
    protected $guard = 'store';

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function products_categories() {
        return $this->hasMany(ProductCategory::class, 'store_id');
    }

    public function getlogoAttribute($value) {
        return '/uploads/stores/logos/' . $value;
    }

    public function getbackgroundAttribute($value) {
        return '/uploads/stores/backgrounds/' . $value;
    }

    public function rates() {
        return $this->hasMany(Rate::class, 'store_id');
    }

    protected $hidden = ['password'];
}
