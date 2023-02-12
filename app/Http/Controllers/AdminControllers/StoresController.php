<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StoresController extends Controller
{
    public function index()
    {
        $items = Store::where('is_registered', 1)->get();
        foreach ($items as $item) {
            $stars = 0;
            $rates = [];
            if ($item->rates->count()) $rates = $item->rates;
            foreach ($rates as $rate) {
                $stars += $rate->stars;
            }
            $rate = 0;
            if ($stars != 0) {
                $rate = $stars / $rates->count();
            }
            $item->rate = intval($rate);
        }
        return view('dashboard.pages.stores.index', compact('items'));
    }

    public function registers()
    {
        $items = Store::where('is_registered', 0)->get();
        return view('dashboard.pages.stores.registers', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        if (!$categories->count()) {
            session()->flash('warning', 'يرجى اضافة قسم واحد على الأقل');
            return redirect(url('/panel'));
        }
        return view('dashboard.pages.stores.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'phone' => 'required',
            'mod_name' => 'required',
            'mod_phone' => 'required',
            'store_email' => 'required',
            'email' => 'required',
            'password' => 'required',
            'branch_count' => 'required',
            'expected_time' => 'required',
            'deli_price' => 'required',
            'min_orders' => 'required',
            'background' => 'required|mimes:png,jpg,jpeg',
            'logo' => 'required|mimes:png,jpg,jpeg',
        ]);
        Store::create([
            'category_id' => intval($request->post('category_id')),
            'name_ar' => $request->post('name_ar'),
            'name_en' => $request->post('name_en'),
            'description_ar' => $request->post('description_ar'),
            'description_en' => $request->post('description_en'),
            'phone' => $request->post('phone'),
            'mod_name' => $request->post('mod_name'),
            'mod_phone' => $request->post('mod_phone'),
            'store_email' => $request->post('store_email'),
            'email' => $request->post('email'),
            'password' => bcrypt($request->post('password')),
            'branch_count' => $request->post('branch_count'),
            'expected_time' => $request->post('expected_time'),
            'deli_price' => $request->post('deli_price'),
            'min_orders' => $request->post('min_orders'),
            'background' => $this->uploadFile($request->file('background'), 'uploads/stores/backgrounds'),
            'logo' => $this->uploadFile($request->file('logo'), 'uploads/stores/logos'),
            'is_registered' => 1
        ]);
        session()->flash('success', 'تم حفظ البيانات بنجاح');
        return redirect(url('stores'));
    }

    public function edit($id)
    {
        $item = Store::findOrFail($id);
        $categories = Category::all();
        if (!$categories->count()) {
            session()->flash('warning', 'يرجى اضافة قسم واحد على الأقل');
            return redirect(url('/'));
        }
        return view('dashboard.pages.stores.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'phone' => 'required',
            'mod_name' => 'required',
            'mod_phone' => 'required',
            'store_email' => 'required',
            'email' => 'required',
            'branch_count' => 'required',
            'expected_time' => 'required',
            'deli_price' => 'required',
            'min_orders' => 'required',
            'background' => 'mimes:png,jpg,jpeg',
            'logo' => 'mimes:png,jpg,jpeg',
        ]);
        $item = Store::findOrFail($id);
        if ($request->hasFile('background')) {
            $item->update([
                'background' => $this->uploadFile($request->file('background'), 'uploads/stores/backgrounds'),
            ]);
        }
        if ($request->hasFile('logo')) {
            $item->update([
                'logo' => $this->uploadFile($request->file('logo'), 'uploads/stores/logos'),
            ]);
        }
        if ($request->has('password') and $request->post('password') != null and $request->post('password' != '')) {
            $item->update([
                'password' => bcrypt($request->post('password')),
            ]);
        }
        $item->update([
            'category_id' => intval($request->post('category_id')),
            'name_ar' => $request->post('name_ar'),
            'name_en' => $request->post('name_en'),
            'description_ar' => $request->post('description_ar'),
            'description_en' => $request->post('description_en'),
            'phone' => $request->post('phone'),
            'mod_name' => $request->post('mod_name'),
            'mod_phone' => $request->post('mod_phone'),
            'store_email' => $request->post('store_email'),
            'email' => $request->post('email'),
            'branch_count' => $request->post('branch_count'),
            'expected_time' => $request->post('expected_time'),
            'deli_price' => $request->post('deli_price'),
            'min_orders' => $request->post('min_orders'),
            'is_registered' => 1
        ]);
        session()->flash('success', 'تم تعديل البيانات بنجاح');
        return redirect(url('stores'));
    }

    public function delete($id)
    {
        Store::findOrFail($id)->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect(url('stores'));
    }

    public function toggle_status($id)
    {
        $store = Store::findOrFail($id);
        $store->update([
            'status' => !$store->status
        ]);
        session()->flash('success', 'تم تغيير الحالة بنجاح');
        return redirect(url('stores'));
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = Store::find($id);
            if (isset($item)) {
                if (File::exists($item->logo)) {
                    File::delete($item->logo);
                }
                if (File::exists($item->background)) {
                    File::delete($item->background);
                }
                $item->delete();
            }
        }
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return back();
    }
}
