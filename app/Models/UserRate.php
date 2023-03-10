<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRate extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function rated() {
        return $this->belongsTo(User::class, 'rated');
    }
}
