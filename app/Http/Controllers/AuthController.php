<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function admin_login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // return redirect(url('/'));
            return redirect(url('/panel'));
        }
        return back();
    }

    public function admin_logout() {
        auth('admin')->logout();
        return redirect(url('admin/login'));
    }

    public function store_login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (auth('store')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // return redirect(url('/'));
            return redirect(url('/store'));
        }
        return back();
    }

    public function store_logout() {
        auth('store')->logout();
        return redirect(url('admin/login'));
    }
}
