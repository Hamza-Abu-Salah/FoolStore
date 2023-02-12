<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CardsController extends Controller
{
    public function index()
    {
        $items = Card::all();
        return view('dashboard.pages.cards.index', compact('items'));
    }

    public function create() {
        return view('dashboard.pages.cards.create');
    }

    public function store(Request $request) {
        $request->validate([
            'number' => 'required',
            'value' => 'required',
        ]);
        Card::create([
            'number' => $request->post('number'),
            'value' => $request->post('value'),
        ]);
        session()->flash('success', 'تم حفظ البيانات بنجاح');
        return redirect(url('cards'));
    }

    public function edit($id) {
        $item = Card::findOrFail($id);
        return view('dashboard.pages.cards.edit', compact('item'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'number' => 'required',
            'value' => 'required',
        ]);
        $item = Card::findOrFail($id);
        $item->update([
            'number' => $request->post('number'),
            'value' => $request->post('value'),
        ]);
        session()->flash('success', 'تم تعديل البيانات بنجاح');
        return redirect(url('cards'));
    }

    public function delete($id) {
        Card::findOrFail($id)->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect(url('cards'));
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = Card::find($id);
            if (isset($item)) {
                $item->delete();
            }
        }
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return back();
    }
}
