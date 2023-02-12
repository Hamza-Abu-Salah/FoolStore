<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BanksController extends Controller
{
    public function index()
    {
        $items = Bank::all();
        return view('dashboard.pages.banks.index', compact('items'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'bank_number' => 'required'
        ]);
        Bank::create([
            'name' => $request->post('name'),
            'bank_number' => $request->post('bank_number'),
        ]);
        session()->flash('success', 'تم حفظ البيانات بنجاح');
        return redirect(url('banks'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'bank_number' => 'required'
        ]);
        $item = Bank::findOrFail($id);
        $item->update([
            'name' => $request->post('name'),
            'bank_number' => $request->post('bank_number'),
        ]);
        session()->flash('success', 'تم تعديل البيانات بنجاح');
        return redirect(url('banks'));
    }

    public function delete($id) {
        Bank::findOrFail($id)->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect(url('banks'));
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = Bank::find($id);
            if (isset($item)) {
                $item->delete();
            }
        }
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return back();
    }
}
