<?php

namespace App\Http\Controllers\StoreControllers;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $items = ProductCategory::where('store_id', auth('store')->id())->orderBy('id', 'desc')->take(500)->get();
        return view('store_dashboard.pages.product_categories.index', compact('items'));
    }

    public function create()
    {
        return view('store_dashboard.pages.product_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);
        ProductCategory::create([
            'name_ar' => $request->post('name_ar'),
            'name_en' => $request->post('name_en'),
            'store_id' => auth('store')->id(),
        ]);
        session()->flash('success', 'تم حفظ البيانات بنجاح');
        return redirect(url('store/products/categories'));
    }

    public function edit($id)
    {
        $item = ProductCategory::findOrFail($id);
        return view('store_dashboard.pages.product_categories.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);
        $item = ProductCategory::findOrFail($id);
        $item->update([
            'name_ar' => $request->post('name_ar'),
            'name_en' => $request->post('name_en'),
        ]);
        session()->flash('success', 'تم تعديل البيانات بنجاح');
        return redirect(url('/store/products/categories'));
    }

    public function delete($id)
    {
        ProductCategory::findOrFail($id)->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect(url('store/products/categories'));
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = ProductCategory::find($id);
            if (isset($item)) {
                $item->delete();
            }
        }
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return back();
    }
}
