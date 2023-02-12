<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function store() {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function captain() {
        return $this->belongsTo(User::class, 'captain_id');
    }

    public function rater() {
        return $this->belongsTo(User::class, 'rater_id');
    }
}
