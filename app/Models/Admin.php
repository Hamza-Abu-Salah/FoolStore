<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
    protected $guard = 'admin';

    public function url() {
        return $this->hasOne(AdminUrl::class, 'admin_id');
    }

    public function getavatarAttribute($value) {
        return 'uploads/admins/avatars/' . $value;
    }
}
