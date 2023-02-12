<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CallUsController extends Controller
{
    public function index() {
        $items = ContactUs::with('user')->paginate(10);
        return view('dashboard.pages.contact_us.index', compact('items'));
    }

    public function delete($id) {
        ContactUs::findOrFail($id)->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect(url('call-us'));
    }

    public function reply($id) {
        $item = ContactUs::findOrFail($id);
        $item->update([
            'reply' => request()->reply,
        ]);
        session()->flash('success', 'تم الرد بنجاح');
        return redirect(url('call-us'));
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = ContactUs::find($id);
            if (isset($item)) {
                $item->delete();
            }
        }
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return back();
    }
}
