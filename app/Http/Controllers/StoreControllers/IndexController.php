<?php

namespace App\Http\Controllers\StoreControllers;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('store_dashboard.index');
    }
}
