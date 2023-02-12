<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{
    public function index() {
        $items = User::where('is_captain', 0)->get();
        return view('dashboard.pages.users.index', compact('items'));
    }

    public function details($id) {
        $item = User::with('orders')->findOrFail($id);
        return view('dashboard.pages.users.details', compact('item'));
    }

    public function delete($id) {
        User::findOrFail($id)->delete();
        session()->flash('success', 'تم حذف المستخدم بنجاح');
        return redirect(url('users'));
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = User::find($id);
            if (isset($item)) {
                $item->delete();
            }
        }
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return back();
    }
}
