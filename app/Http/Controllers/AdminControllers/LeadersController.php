<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\CaptainInfo;
use App\Models\RequiredDocument;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LeadersController extends Controller
{
    public function index()
    {
        $items = User::orderBy('id', 'desc')->withCount('captain_orders')->with(['captain_rates', 'docs'])->where('is_captain', 1)->paginate();
        foreach ($items as $item) {
            $stars = 0;
            $rates = [];
            if ($item->captain_rates->count()) $rates = $item->captain_rates;
            foreach ($rates as $rate) {
                $stars += $rate->stars;
            }
            $rate = 0;
            if ($stars != 0) {
                $rate = $stars / $rates->count();
            }
            $item->rate = intval($rate);
        }
        return view('dashboard.pages.leaders.index', compact('items'));
    }

    public function registers()
    {
        $items = User::orderBy('id', 'desc')->withCount('captain_orders')->with('captain_rates')->where('is_captain', 1)
            ->where('status', 0)
            ->paginate();
        return view('dashboard.pages.leaders.registers', compact('items'));
    }

    public function identity_docs()
    {
        $items = User::where('is_identity_verify_request', 1)
            ->where('status', 0)
            ->where('is_captain', 1)->paginate();
        foreach ($items as $item) {
            $stars = 0;
            $rates = $item->captain_rates;
            foreach ($rates as $rate) {
                $stars += $rate->stars;
            }
            $rate = 0;
            if ($stars != 0) {
                $rate = $stars / $rates->count();
            }
            $item->rate = intval($rate);
        }
        return view('dashboard.pages.leaders.identity_docs', compact('items'));
    }

    public function create()
    {
        $banks = Bank::all();
        return view('dashboard.pages.leaders.create', compact('banks'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'longitude' => 'required',
                'latitude' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'id_number' => 'required',
                'nationality' => 'required',
                'bank_id' => 'required',
                'image_1' => 'required',
                'image_2' => 'required',
                'image_3' => 'required',
                'image_4' => 'required',
            ]);
            $captain = User::create([
                'is_captain' => 1,
                'longitude' => $request->post('longitude'),
                'name' => $request->post('name'),
                'latitude' => $request->post('latitude'),
                'phone' => $request->post('phone'),
                'email' => $request->post('email'),
            ]);

            $info = CaptainInfo::create([
                'captain_id' => $captain->id,
                'nationality' => $request->post('nationality'),
                'bank_id' => $request->post('bank_id'),
                'id_number' => $request->post('id_number'),
            ]);

            $docs = RequiredDocument::create([
                'captain_id' => $captain->id,
                'id_image' => $this->uploadFile($request->file('image_1'), 'uploads/captain/required_documents'),
                'driving_license_image' => $this->uploadFile($request->file('image_2'), 'uploads/captain/required_documents'),
                'from_back_image' => $this->uploadFile($request->file('image_3'), 'uploads/captain/required_documents'),
                'vehicle_registration' => $this->uploadFile($request->file('image_4'), 'uploads/captain/required_documents'),
            ]);
            session()->flash('success', 'تم انشاء الكابتن بنجاح');
            return redirect('leaders');
        } catch (\Exception $e) {
            return back();
        }
    }

    public function edit($id)
    {
        $item = User::with('info', 'docs')->findOrFail($id);
        if (!$item->is_captain) abort(404);
        $banks = Bank::all();
        return view('dashboard.pages.leaders.edit', compact('banks', 'item'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'longitude' => 'required',
                'latitude' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'id_number' => 'required',
                'nationality' => 'required',
                'bank_id' => 'required',
            ]);
            $captain = User::with('info', 'docs')->findOrFail($id);
            $captain->update([
                'is_captain' => 1,
                'longitude' => $request->post('longitude'),
                'name' => $request->post('name'),
                'latitude' => $request->post('latitude'),
                'phone' => $request->post('phone'),
                'email' => $request->post('email'),
            ]);

            $captain->info->update([
                'nationality' => $request->post('nationality'),
                'bank_id' => $request->post('bank_id'),
            ]);
            if ($request->hasFile('id_image')) {
                $captain->docs->update([
                    'id_image' => $this->uploadFile($request->file('image_1'), 'uploads/captain/required_documents'),
                ]);
            }
            if ($request->hasFile('driving_license_image')) {
                $captain->docs->update([
                    'driving_license_image' => $this->uploadFile($request->file('image_2'), 'uploads/captain/required_documents'),
                ]);
            }
            if ($request->hasFile('from_back_image')) {
                $captain->docs->update([
                    'from_back_image' => $this->uploadFile($request->file('image_3'), 'uploads/captain/required_documents'),
                ]);
            }
            if ($request->hasFile('vehicle_registration')) {
                $captain->docs->update([
                    'vehicle_registration' => $this->uploadFile($request->file('image_4'), 'uploads/captain/required_documents'),
                ]);
            }
            session()->flash('success', 'تم انشاء الكابتن بنجاح');
            return redirect('leaders');
        } catch (\Exception $e) {
            return back();
        }
    }

    public function toggle_active($id, $status)
    {
        $user = User::findOrFail($id);
        if ($user->is_captain) {
            $user->update([
                'status' => $user->status == 1? 2 : 1,
            ]);
        } else {
            $user->update([
                'status' => $user->status,
            ]);
        }
        session()->flash('success', 'تم التحديث بنجاح');
        return back();
    }

    public function toggle_priority($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'has_priority' => !$user->has_priority
        ]);
        session()->flash('success', 'تم التحديث بنجاح');
        return back();
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('success', 'تم الحذف بنجاح');
        return back();
    }

    public function accept($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'is_identity_verified' => 1,
            'is_identity_verify_request' => 1,
        ]);
        session()->flash('success', 'تم التوثيق بنجاح');
        return back();
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
