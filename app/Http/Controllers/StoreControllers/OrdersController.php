<?php

namespace App\Http\Controllers\StoreControllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request) {
        $items = Order::with('user', 'captain', 'store')
            ->where('store_id', auth('store')->id())
            ->orderBy('id', 'desc')
            ->when($request->get('to'), function ($item, $value) {
                $item->where('created_at', '<=', $value);
            })
            ->when($request->get('from'), function ($item, $value) {
                $item->where('created_at', '>=', $value);
            })
            ->take(500)->get();
        return view('store_dashboard.pages.orders.index', compact('items'));
    }
}
