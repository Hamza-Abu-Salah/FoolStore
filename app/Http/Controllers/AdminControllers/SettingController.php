<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {
        $item = Setting::first();
        return view('dashboard.pages.settings', compact('item'));
    }

    public function settings(Request $request) {
        $item = Setting::first();
        if (isset($item)) {
            $item->update($request->except('_token'));
        } else {
            Setting::create($request->except('_token'));
        }
        return back();
    }
}
