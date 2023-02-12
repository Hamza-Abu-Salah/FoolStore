<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequiredDocument extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getIdImageAttribute($value) {
        return '/uploads/captain/required_documents/' . $value;
    }

    public function getVehicleRegistrationAttribute($value) {
        return '/uploads/captain/required_documents/' . $value;
    }

    public function getDrivingLicenseImageAttribute($value) {
        return '/uploads/captain/required_documents/' . $value;
    }

    public function getFromBackImageAttribute($value) {
        return '/uploads/captain/required_documents/' . $value;
    }
}
