<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\CustomerReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomerReviewController extends Controller
{
    public function index()
    {
        $items = CustomerReview::orderBy('id', 'desc')->get();
        return view('dashboard.pages.customers_reviews.index', compact('items'));
    }

    public function create()
    {
        return view('dashboard.pages.customers_reviews.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'avatar' => 'required|mimes:png,jpg,jpeg',
                'name_ar' => 'required',
                'name_en' => 'required',
                'content_ar' => 'required',
                'content_en' => 'required',
                'status' => 'required'
            ]);
            if ($request->hasFile('avatar')) {
                $avatar = $this->uploadFile($request->file('avatar'), 'uploads/customers/reviews');
                CustomerReview::create([
                    'avatar' => $avatar,
                    'name_ar' => $request->post('name_ar'),
                    'name_en' => $request->post('name_en'),
                    'content_ar' => $request->post('content_ar'),
                    'content_en' => $request->post('content_en'),
                    'status' => $request->post('status') == '1'? 1 : 0,
                ]);
            }
            session()->flash('success', 'تم انشاء الرأي بنجاح');
            return redirect(url('customers/reviews'));
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
    }

    public function edit($id)
    {
        $item = CustomerReview::findOrFail($id);
        return view('dashboard.pages.customers_reviews.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'avatar' => 'required|mimes:png,jpg,jpeg',
                'name_ar' => 'required',
                'name_en' => 'required',
                'content_ar' => 'required',
                'content_en' => 'required',
                'status' => 'required'
            ]);
            $item = CustomerReview::findOrFail($id);
            if ($request->hasFile('avatar')) {
                $avatar = $this->uploadFile($request->file('avatar'), 'uploads/customers/reviews');
                $item->update([
                    'avatar' => $avatar,
                    'name_ar' => $request->post('name_ar'),
                    'name_en' => $request->post('name_en'),
                    'content_ar' => $request->post('content_ar'),
                    'content_en' => $request->post('content_en'),
                    'status' => $request->post('status') == '1'? 1 : 0,
                ]);
            }
            session()->flash('success', 'تم تعديل الرأي بنجاح');
            return redirect(url('customers/reviews'));
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
    }

    public function delete($id)
    {
        CustomerReview::findOrFail($id)->delete();
        session()->flash('success', 'تم حذف الرأي بنجاح');
        return redirect(url('customers/reviews'));
    }

    public function toggle_status($id)
    {
        $item = CustomerReview::findOrFail($id);
        $item->update([
            'status' => !$item->status
        ]);
        session()->flash('success', 'تم تغيير الحالة بنجاح');
        return back();
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = CustomerReview::find($id);
            if (isset($item)) {
                if (File::exists($item->avatar)) {
                    File::delete($item->avatar);
                }
                $item->delete();
            }
        }
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return back();
    }
}
