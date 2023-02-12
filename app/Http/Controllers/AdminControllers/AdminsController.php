<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminsController extends Controller
{
    public function index() {
        $items = Admin::where('id', '!=', '1')->where('id', '!=', auth('admin')->id())->orderBy('id', 'desc')->get();
        return view('dashboard.pages.admins.index', compact('items'));
    }

    public function create() {
        return view('dashboard.pages.admins.create');
    }

    public function store(Request $request) {
        try {
            $admin = Admin::where('email', $request->post('email'))->first();
            if (isset($admin)) {
                session()->flash('error', 'هذا الايميل مأخوذ فعلًا لأدمن آخر');
                return back();
            }
            $avatar = '';
            if ($request->hasFile('avatar')) {
                $avatar = $this->uploadFile($request->file('avatar'), 'uploads/admins/avatars');
            }
            $admin = Admin::create([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'password' => bcrypt($request->post('password')),
                'avatar' => $avatar,
            ]);
            $admin_url = AdminUrl::create($request->except(['name', 'password', 'email', '_token', 'avatar']));
            $admin_url->update([
                'admin_id' => $admin->id
            ]);
            session()->flash('success', 'تم انشاء ادمن بنجاح');
            return redirect(url('admins'));
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
    }

    public function edit($id) {
        $item = Admin::with('url')->findOrFail($id);
        return view('dashboard.pages.admins.edit', compact('item'));
    }

    public function update(Request $request, $id) {
        try {
            $admin = Admin::findOrFail($id);
            $new_admin = Admin::where('email', $request->post('email'))->first();
            if ($new_admin->id != $id) {
                session()->flash('error', 'هذا الايميل مأخوذ فعلًا لأدمن آخر');
                return back();
            }
            if ($request->hasFile('avatar')) {
                $avatar = $this->uploadFile($request->file('avatar'), 'uploads/admins/avatars');
                if (File::exists($admin->avatar)) {
                    File::delete($admin->avatar);
                }
                $admin->update([
                    'avatar' => $avatar
                ]);
            }
            $admin->update([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'password' => bcrypt($request->post('password')),
            ]);
            $admin_url = AdminUrl::where('admin_id', $id)->first();
            if (isset($admin_url)) {
                $admin_url->update([
                    "admins/delete" => $request->post("admins/delete"),
                    "admins/edit" => $request->post("admins/edit"),
                    "admins/details" => $request->post("admins/details"),
                    "admins/create" => $request->post("admins/create"),
                    "admins" => $request->post("admins"),
                    "users/accept" => $request->post("users/accept"),
                    "users/edit" => $request->post("users/edit"),
                    "users" => $request->post("users"),
                    "leaders/accept" => $request->post("leaders/accept"),
                    "leaders/delete" => $request->post("leaders/delete"),
                    "leaders/edit" => $request->post("leaders/edit"),
                    "leaders/details" => $request->post("leaders/details"),
                    "leaders/create" => $request->post("leaders/create"),
                    "leaders" => $request->post("leaders"),
                    "sliders/delete" => $request->post("sliders/delete"),
                    "sliders/details" => $request->post("sliders/details"),
                    "sliders/edit" => $request->post("sliders/edit"),
                    "sliders/create" => $request->post("sliders/create"),
                    "sliders" => $request->post("sliders"),
                    "categories/delete" => $request->post("categories/delete"),
                    "categories/edit" => $request->post("categories/edit"),
                    "categories/details" => $request->post("categories/details"),
                    "categories/create" => $request->post("categories/create"),
                    "categories" => $request->post("categories"),
                    "stores/accept" => $request->post("stores/accept"),
                    "stores/delete" => $request->post("stores/delete"),
                    "stores/edit" => $request->post("stores/edit"),
                    "stores/details" => $request->post("stores/details"),
                    "stores/create" => $request->post("stores/create"),
                    "stores" => $request->post("stores"),
                    "coupons/delete" => $request->post("coupons/delete"),
                    "coupons/edit" => $request->post("coupons/edit"),
                    "coupons/details" => $request->post("coupons/details"),
                    "coupons/create" => $request->post("coupons/create"),
                    "coupons" => $request->post("coupons"),
                    "reviews/accept" => $request->post("reviews/accept"),
                    "reviews/delete" => $request->post("reviews/delete"),
                    "reviews/details" => $request->post("reviews/details"),
                    "reviews" => $request->post("reviews"),
                    "orders/details" => $request->post("orders/details"),
                    "orders" => $request->post("orders"),
                    "call-us/reply" => $request->post("call-us/reply"),
                    "call-us/delete" => $request->post("call-us/delete"),
                    "call-us" => $request->post("call-us"),
                    "notifications/delete" => $request->post("notifications/delete"),
                    "notifications" => $request->post("notifications"),
                    "settings" => $request->post("settings"),
                ]);
            } else {
                $admin_url = AdminUrl::create($request->except(['name', 'password', 'email', '_token']));
                $admin_url->update([
                    'admin_id' => $id,
                ]);
            }
            session()->flash('success', 'تم تعديل ادمن بنجاح');
            return redirect(url('admins'));
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
    }

    public function delete($id) {
        Admin::findOrFail($id)->delete();
        session()->flash('success', 'تم حذف الادمن بنجاح');
        return redirect(url('admins'));
    }

    public function groupDelete(Request $request) {
        foreach ($request->post('ids') as $id) {
            $item = Admin::find($id);
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
