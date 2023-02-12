<?php

namespace App\Http\Controllers\StoreControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function index()
    {
        $items = Product::where('store_id', auth('store')->id())->orderBy('id', 'desc')->take(500)->get();
        return view('store_dashboard.pages.products.index', compact('items'));
    }

    public function create()
    {
        $categories = ProductCategory::where('store_id', auth('store')->id())->get();
        if (!$categories->count()) {
            session()->flash('warning', 'يرجى اضافة قسم على الأقل');
            return redirect(url('/store/products'));
        }
        return view('store_dashboard.pages.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);
        if ($request->hasFile('image')) {
            Product::create([
                'name_ar' => $request->post('name_ar'),
                'name_en' => $request->post('name_en'),
                'store_id' => auth('store')->id(),
                'image' => $this->uploadFile($request->file('image'), 'uploads/products'),
                'price' => $request->post('price'),
                'category_id' => $request->post('category_id')
            ]);
        }
        session()->flash('success', 'تم حفظ البيانات بنجاح');
        return redirect(url('store/products'));
    }

    public function edit($id)
    {
        $item = Product::findOrFail($id);
        $categories = ProductCategory::where('store_id', auth('store')->id())->get();
        if (!$categories->count()) {
            session()->flash('warning', 'يرجى اضافة قسم على الأقل');
            return redirect(url('/store/products'));
        }
        return view('store_dashboard.pages.products.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);
        $item = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            if (File::exists($item->image)) {
                File::delete($item->image);
            }
            $item->update([
                'name_ar' => $request->post('name_ar'),
                'name_en' => $request->post('name_en'),
                'store_id' => auth('store')->id(),
                'image' => $this->uploadFile($request->file('image'), 'uploads/products'),
                'price' => $request->post('price'),
                'category_id' => $request->post('category_id')
            ]);
        } else {
            $item->update([
                'name_ar' => $request->post('name_ar'),
                'name_en' => $request->post('name_en'),
                'store_id' => auth('store')->id(),
                'price' => $request->post('price'),
                'category_id' => $request->post('category_id')
            ]);
        }
        session()->flash('success', 'تم تعديل البيانات بنجاح');
        return redirect(url('/store/products'));
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect(url('store/products'));
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = Product::find($id);
            if (isset($item) and $item->store_id == auth('store')->id()) {
                $item->delete();
            }
        }
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return back();
    }
}
