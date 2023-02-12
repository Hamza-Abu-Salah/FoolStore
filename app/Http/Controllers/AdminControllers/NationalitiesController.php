<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NationalitiesController extends Controller
{
    public function index()
    {
        $items = Nationality::paginate(10);
        return view('dashboard.pages.nationalities.index', compact('items'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);
        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'), 'uploads/nationalities/flags');
            Nationality::create([
                'name' => $request->post('name'),
                'flag' => $image
            ]);
        }
        session()->flash('success', 'تم حفظ البيانات بنجاح');
        return redirect(url('nationalities'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:png,jpg,jpeg'
        ]);
        $item = Nationality::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'), 'uploads/nationalities/flags');
            $item->update([
                'image' => $image,
            ]);
        }
        $item->update([
            'name' => $request->post('name'),
        ]);
        session()->flash('success', 'تم تعديل البيانات بنجاح');
        return redirect(url('nationalities'));
    }

    public function delete($id) {
        Nationality::findOrFail($id)->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect(url('nationalities'));
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = Nationality::find($id);
            if (isset($item)) {
                if (File::exists($item->flag)) {
                    File::delete($item->flag);
                }
                $item->delete();
            }
        }
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return back();
    }
}
