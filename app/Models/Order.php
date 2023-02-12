<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function order_stores() {
        return $this->hasMany(OrderStore::class);
    }

    public function order_products() {
        return $this->hasMany(OrderProduct::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function captain() {
        return $this->belongsTo(User::class, 'captain_id');
    }

    public function store() {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
