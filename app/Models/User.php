<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static findOrFail(int|string|null $id)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders() {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function captain_orders() {
        return $this->hasMany(Order::class, 'captain_id');
    }

    public function user_rates() {
        return $this->hasMany(Rate::class, 'user_id');
    }

    public function captain_rates() {
        return $this->hasMany(Rate::class, 'captain_id');
    }

    public function docs() {
        return $this->hasOne(RequiredDocument::class, 'captain_id');
    }

    public function info() {
        return $this->hasOne(CaptainInfo::class, 'captain_id');
    }
}
