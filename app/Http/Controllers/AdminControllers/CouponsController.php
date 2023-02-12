<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CouponsController extends Controller
{
    public function index()
    {
        $items = Coupon::all();
        return view('dashboard.pages.coupons.index', compact('items'));
    }

    public function store(Request $request) {
        $request->validate([
            'code' => 'required',
            'amount' => 'required',
            'type' => 'required'
        ]);
        Coupon::create([
            'code' => $request->post('code'),
            'amount' => $request->post('amount'),
            'type' => $request->post('type'),
        ]);
        session()->flash('success', 'تم حفظ البيانات بنجاح');
        return redirect(url('coupons'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'code' => 'required',
            'amount' => 'required',
            'type' => 'required'
        ]);
        $item = Coupon::findOrFail($id);
        $item->update([
            'code' => $request->post('code'),
            'amount' => $request->post('amount'),
            'type' => $request->post('type'),
        ]);
        session()->flash('success', 'تم تعديل البيانات بنجاح');
        return redirect(url('coupons'));
    }

    public function delete($id) {
        Coupon::findOrFail($id)->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect(url('coupons'));
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = Coupon::find($id);
            if (isset($item)) {
                $item->delete();
            }
        }
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return back();
    }
}
