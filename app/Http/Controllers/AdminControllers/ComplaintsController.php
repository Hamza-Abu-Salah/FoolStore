<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Order;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{

    public function stores()
    {
        $items = Complaint::where('store_id', '!=', null)->orderBy('id', 'desc')->take(700)->get();
        foreach ($items as $item) {
            $order = Order::orderBy('id', 'desc')->where('store_id', $item->store_id)->first();
            $item->last_order = null;
            if (isset($order)) $item->last_order = $order->created_at;
        }
        return view('dashboard.pages.complaints.stores', compact('items'));
    }

    public function captains()
    {
        $items = Complaint::where('captain_id', '!=', null)->orderBy('id', 'desc')->take(700)->get();
        foreach ($items as $item) {
            $order = Order::orderBy('id', 'desc')->where('captain_id', $item->captain_id)->first();
            $item->last_order = null;
            if (isset($order)) $item->last_order = $order->created_at;
        }
        return view('dashboard.pages.complaints.captains', compact('items'));
    }

    public function users()
    {
        $items = Complaint::where('user_id', '!=', null)->orderBy('id', 'desc')->take(700)->get();
        foreach ($items as $item) {
            $order = Order::orderBy('id', 'desc')->where('user_id', $item->captain_id)->first();
            $item->last_order = null;
            if (isset($order)) $item->last_order = $order->created_at;
        }
        return view('dashboard.pages.complaints.users', compact('items'));
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = Complaint::find($id);
            if (isset($item)) {
                $item->delete();
            }
        }
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return back();
    }
}
