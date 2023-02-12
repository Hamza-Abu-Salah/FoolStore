<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function index()
    {
        $items = Product::with('store', 'category')->orderBy('id', 'desc')->where('is_accept', 0)->take(700)->get();
        return view('dashboard.pages.products.all', compact('items'));
    }

    public function accepted()
    {
        $items = Product::with('store', 'category')->where('is_accept', 0)->get();
        return view('dashboard.pages.products.accepted', compact('items'));
    }

    public function waiting()
    {
        $items = Product::with('store', 'category')->where('is_accept', 0)->get();
        return view('dashboard.pages.products.waiting', compact('items'));
    }

    public function toggle_accept($id) {
        $item = Product::findOrFail($id);
        $item->update([
            'is_accept' => !$item->is_accept
        ]);
        session()->flash('success', 'تم القبول بنجاح');
        return back();
    }

    public function delete($id) {
        $item = Product::findOrFail($id);
        $item->delete();
        if (File::exists($item->image)) {
            File::delete($item->image);
        }
        session()->flash('success', 'تم الحذف بنجاح');
        return back();
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = Product::find($id);
            if (isset($item)) {
                if (File::exists($item->image)) {
                    File::delete($item->image);
                }
                $item->delete();
            }
        }
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return back();
    }
}
