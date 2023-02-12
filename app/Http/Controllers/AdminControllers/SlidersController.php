<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlidersController extends Controller
{
    public function index()
    {
        $items = Slider::all();
        return view('dashboard.pages.sliders.index', compact('items'));
    }

    public function create() {
        return view('dashboard.pages.sliders.create');
    }

    public function store(Request $request) {
        $request->validate([
            'image' => "required|mimes:jpg,jpeg,png",
            'date' => 'required',
            'long' => 'required',
            'url' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'), 'uploads/sliders');
            Slider::create([
                'image' => $image,
                'url' => $request->post('url'),
                'date' => $request->post('date'),
                'long' => $request->post('long'),
            ]);
        }
        session()->flash('success', 'تم حفظ البيانات بنجاح');
        return redirect(url('sliders'));
    }

    public function edit($id) {
        $item = Slider::findOrFail($id);
        return view('dashboard.pages.sliders.edit', compact('item'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'date' => 'required',
            'long' => 'required',
            'url' => 'required'
        ]);
        $item = Slider::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'), 'uploads/sliders');
            $item->update([
                'image' => $image,
                'url' => $request->post('url'),
                'date' => $request->post('date'),
                'long' => $request->post('long'),
            ]);
        } else {
            $item->update([
                'url' => $request->post('url'),
                'date' => $request->post('date'),
                'long' => $request->post('long'),
            ]);
        }
        session()->flash('success', 'تم تعديل البيانات بنجاح');
        return redirect(url('sliders'));
    }

    public function delete($id) {
        Slider::findOrFail($id)->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect(url('sliders'));
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = Slider::find($id);
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
