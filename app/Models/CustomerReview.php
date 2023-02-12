<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerReview extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getavatarAttribute($value) {
        return 'storage/customers/reviews/' . $value;
    }
}
