<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\Setting;
use App\Models\Store_request;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\CustomerReview;
use Illuminate\Support\Facades\Artisan;

class SiteController extends Controller
{
    public function try()
    {
        // $info=
        Artisan::call('optimize');
        return view('site.try');
    }

    public function home()
    {
        // $info=
        $items = CustomerReview::where('status', 1)->orderBy('id', 'desc')->take(3)->get();
        // return $items[0]->name_ar;
        return view('site.index', compact('items'));
    }

    public function work_in_twenty()
    {
        return view('site.work_in_twenty');
    }

    public function contact_us()
    {
        return view('site.contact_us');
    }

    public function contactus(Request $request)
    {

        $user = User::where('name', $request->name)->first();
        if ($user) {
            $user_id = $user->id;
        } else {
            $user_id = null;
        }

        ContactUs::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message_title' => $request->message_title,
            'message' => $request->message,
            'replied' => 0,
            'reply' => 0,
        ]);
        session()->flash('success', 'تم ارسال الطلب بنجاح');
        return redirect()->route('contact_us');
    }

    public function register_store()
    {
        return view('site.register_store');
    }

    public function registerstore(Request $request)
    {
        $file = $request->tax_certificate_Copy;
        $extension = $file->getClientOriginalExtension();
        $fileName = (time()) . '.' . $extension;
        $file->storeAs('public/site', $fileName);

        Store::create([
            'brand_name' => $request->brand_name,
            'registration_number' => $request->registration_number,
            'store_email' => $request->store_email,
            'tax_certificate_Copy' => $fileName,
            'classification' => $request->classification,
            'registered' => $request->registered,
            'city' => $request->city,
            'mod_phone' => $request->phone,
            'position' => $request->position,
            'mod_name' => $request->admin_name,
            'status' => 0,


        ]);
        session()->flash('success', 'تم ارسال الطلب بنجاح');
        return redirect()->route('register_store');
    }

    public function documentation_login()
    {
        return view('site.login');
    }

    public function about()
    {
        return view('site.about');
    }

    public function role()
    {
        $sitting = Setting::first();
        return view('site.role', compact('sitting'));
    }

    public function conditions()
    {
        $sitting = Setting::first();
        return view('site.conditions', compact('sitting'));
    }

    public function documentation(Request $request)
    {
        $captain = User::where('is_captain', 1)->where('phone', $request->phone)->first();
        if ($captain) {
            User::find($captain->id)->update([
                'is_identity_verify_request' => 1,
            ]);
            session()->flash('success', 'تم  ارسال طلب التوثيق  بنجاح');
            return redirect()->route('documentation_login');
        } else {
            session()->flash('warning', 'الحساب غير متوفر');
            return redirect()->route('documentation_login');
        }


    }
}
