<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrdersController extends Controller
{
    public function index(Request $request) {
        $items = Order::with('user', 'captain', 'store')->orderBy('id', 'desc')
            ->when($request->get('to'), function ($item, $value) {
                $item->where('created_at', '<=', $value);
            })
            ->when($request->get('from'), function ($item, $value) {
                $item->where('created_at', '>=', $value);
            })
            ->take(500)->get();
        return view('dashboard.pages.orders.index', compact('items'));
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = Order::find($id);
            if (isset($item)) {
                $item->delete();
            }
        }
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return back();
    }
}
