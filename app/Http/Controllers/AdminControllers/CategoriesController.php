<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $items = Category::all();
        return view('dashboard.pages.categories.index', compact('items'));
    }

    public function create() {
        return view('dashboard.pages.categories.create');
    }

    public function store(Request $request) {
        $request->validate([
            'image' => "required|mimes:jpg,jpeg,png",
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'), 'uploads/categories');
            Category::create([
                'image' => $image,
                'name_ar' => $request->post('name_ar'),
                'name_en' => $request->post('name_en'),
            ]);
        }
        session()->flash('success', 'تم حفظ البيانات بنجاح');
        return redirect(url('categories'));
    }

    public function edit($id) {
        $item = Category::findOrFail($id);
        return view('dashboard.pages.categories.edit', compact('item'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);
        $item = Category::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'), 'uploads/categories');
            $item->update([
                'image' => $image,
                'name_ar' => $request->post('name_ar'),
                'name_en' => $request->post('name_en'),
            ]);
        } else {
            $item->update([
                'name_ar' => $request->post('name_ar'),
                'name_en' => $request->post('name_en'),
            ]);
        }
        session()->flash('success', 'تم تعديل البيانات بنجاح');
        return redirect(url('categories'));
    }

    public function delete($id) {
        Category::findOrFail($id)->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect(url('categories'));
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = Category::find($id);
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
