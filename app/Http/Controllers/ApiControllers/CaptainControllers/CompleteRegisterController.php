<?php

namespace App\Http\Controllers\ApiControllers\CaptainControllers;

use App\Http\Controllers\Controller;
use App\Models\CaptainInfo;
use App\Models\RequiredDocument;
use App\Models\User;
use App\Models\VehicleInfo;
use Illuminate\Http\Request;

class CompleteRegisterController extends Controller
{
    public function captain_info(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            if (!(auth('sanctum')->user()->is_captain?? 0)) {
                return $this->error("You are not a captain");
            }
            $request->validate([
                'full_name' => 'required',
                'id_number' => 'required',
                'nationality' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'birthday' => 'required|date',
                'birthday_type' => 'required',
                'avatar' => 'mimes:png,jpeg,jpg',
                'medical_examination' => 'mimes:png,jpeg,jpg',
            ]);
            $id = auth('sanctum')->id();
            $info = CaptainInfo::where('captain_id', $id)->first();
            if (isset($info)) {
                $avatar = $info->avatar;
                $medical_examination = $info->medical_examination;
                if ($request->hasFile('avatar')) {
                    $avatar = $this->uploadFile($request->file('avatar'), 'uploads/users/pictures');
                }
                if ($request->hasFile('medical_examination')) {
                    $medical_examination = $this->uploadFile($request->file('medical_examination'), 'uploads/users/pictures');
                }
                $userPhone = User::where('phone', $request->post('phone'))->where('id', '!=', $id)->first();
                $userEmail = User::where('email', $request->post('email'))->where('id', '!=', $id)->first();
                if (isset($userPhone)) {
                    return $this->error('This mobile is used for another user');
                }
                if (isset($userEmail)) {
                    return $this->error('This email is used for another user');
                }
                $info->update([
                    'full_name' => $request->post('full_name'),
                    'id_number' => $request->post('id_number'),
                    'nationality' => $request->post('nationality'),
                    'email' => $request->post('email'),
                    'phone' => $request->post('phone'),
                    'birthday' => $request->post('birthday'),
                    'birthday_type' => $request->post('birthday_type'),
                    'avatar' => $avatar,
                    'medical_examination' => $medical_examination,
                ]);
            } else {
                $avatar = 'image.jpg';
                $medical_examination = 'image.jpg';
                if ($request->hasFile('avatar')) {
                    $avatar = $this->uploadFile($request->file('avatar'), 'uploads/users/pictures');
                }
                if ($request->hasFile('medical_examination')) {
                    $medical_examination = $this->uploadFile($request->file('medical_examination'), 'uploads/users/pictures');
                }
                $request->validate([
                    'phone' => 'unique:users,phone',
                    'email' => 'unique:users,email',
                ]);

                $info = CaptainInfo::create([
                    'captain_id' => $id,
                    'full_name' => $request->post('full_name'),
                    'id_number' => $request->post('id_number'),
                    'nationality' => $request->post('nationality'),
                    'email' => $request->post('email'),
                    'phone' => $request->post('phone'),
                    'birthday' => $request->post('birthday'),
                    'birthday_type' => $request->post('birthday_type'),
                    'avatar' => $avatar,
                    'medical_examination' => $medical_examination,
                ]);
            }
            return $this->success($info);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function get_captain_info(): \Illuminate\Http\JsonResponse
    {
        try {
            if (!(auth('sanctum')->user()->is_captain?? 0)) {
                return $this->error("You are not a captain");
            }
            $info = CaptainInfo::where('captain_id', auth('sanctum')->id())->first();
            if (!isset($info)) {
                return $this->error('Captain info not found', 404);
            }
            return $this->success($info);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }

    }

    public function vehicle_info(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            if (!(auth('sanctum')->user()->is_captain?? 0)) {
                return $this->error("You are not a captain");
            }
            $request->validate([
                'vehicle_brand' => 'required',
                'vehicle_model' => 'required',
                'vehicle_date' => 'required|date',
                'vehicle_serial' => 'required',
                'vehicle_plate_numbers' => 'required',
                'vehicle_plate_letters' => 'required',
                'vehicle_type' => 'required',
                'work_region' => 'required',
                'bank' => 'required',
                'bank_number' => 'required',
                'bank_number_address' => 'required',
            ]);
            if (strlen($request->post('bank_number')) !== 24) {
                return $this->error("The bank number must be exactly 24 characters.");
            }
            $id = auth('sanctum')->id();
            $info = VehicleInfo::where('captain', $id)->first();
            if (isset($info)) {
                $info->update([
                    'vehicle_brand' => $request->post('vehicle_brand'),
                    'vehicle_model' => $request->post('vehicle_model'),
                    'vehicle_date' => $request->post('vehicle_date'),
                    'vehicle_serial' => $request->post('vehicle_serial'),
                    'vehicle_plate_numbers' => $request->post('vehicle_plate_numbers'),
                    'vehicle_plate_letters' => $request->post('vehicle_plate_letters'),
                    'vehicle_type' => $request->post('vehicle_type'),
                    'work_region' => $request->post('work_region'),
                    'bank' => $request->post('bank'),
                    'bank_number' => $request->post('bank_number'),
                    'bank_number_address' => $request->post('bank_number_address'),
                ]);
            } else {
                $info = VehicleInfo::create([
                    'captain' => $id,
                    'vehicle_brand' => $request->post('vehicle_brand'),
                    'vehicle_model' => $request->post('vehicle_model'),
                    'vehicle_date' => $request->post('vehicle_date'),
                    'vehicle_serial' => $request->post('vehicle_serial'),
                    'vehicle_plate_numbers' => $request->post('vehicle_plate_numbers'),
                    'vehicle_plate_letters' => $request->post('vehicle_plate_letters'),
                    'vehicle_type' => $request->post('vehicle_type'),
                    'work_region' => $request->post('work_region'),
                    'bank' => $request->post('bank'),
                    'bank_number' => $request->post('bank_number'),
                    'bank_number_address' => $request->post('bank_number_address'),
                ]);
            }
            return $this->success($info);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function get_vehicle_info(): \Illuminate\Http\JsonResponse
    {
        try {
            if (!(auth('sanctum')->user()->is_captain?? 0)) {
                return $this->error("You are not a captain");
            }
            $info = VehicleInfo::where('captain', auth('sanctum')->id())->first();
            if (!isset($info)) {
                return $this->error('Vehicle info not found', 404);
            }
            return $this->success($info);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }

    }

    public function required_documents(Request $request)
    {
        try {
            if (!(auth('sanctum')->user()->is_captain?? 0)) {
                return $this->error("You are not a captain");
            }
            $request->validate([
                'id_image' => 'required',
                'driving_license_image' => 'required',
                'from_back_image' => 'required',
                'vehicle_registration' => 'required',
            ]);
            $id = auth('sanctum')->id();
            $item = RequiredDocument::where('captain_id', $id)->first();
            if (isset($item)) {
                if ($request->hasFile('id_image')) {
                    $item->update([
                        'id_image' => $this->uploadFile($request->file('id_image'), 'uploads/captain/required_documents'),
                    ]);
                }
                if ($request->hasFile('driving_license_image')) {
                    $item->update([
                        'driving_license_image' => $this->uploadFile($request->file('driving_license_image'), 'uploads/captain/required_documents'),
                    ]);
                }
                if ($request->hasFile('from_back_image')) {
                    $item->update([
                        'from_back_image' => $this->uploadFile($request->file('from_back_image'), 'uploads/captain/required_documents'),
                    ]);
                }
                if ($request->hasFile('vehicle_registration')) {
                    $item->update([
                        'vehicle_registration' => $this->uploadFile($request->file('vehicle_registration'), 'uploads/captain/required_documents'),
                    ]);
                }
            } else {
                $item = RequiredDocument::create([
                    'captain_id' => auth('sanctum')->id(),
                    'id_image' => $this->uploadFile($request->file('id_image'), 'uploads/captain/required_documents'),
                    'driving_license_image' => $this->uploadFile($request->file('driving_license_image'), 'uploads/captain/required_documents'),
                    'from_back_image' => $this->uploadFile($request->file('from_back_image'), 'uploads/captain/required_documents'),
                    'vehicle_registration' => $this->uploadFile($request->file('vehicle_registration'), 'uploads/captain/required_documents'),
                ]);
            }
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function get_required_documents(): \Illuminate\Http\JsonResponse
    {
        try {
            if (!(auth('sanctum')->user()->is_captain?? 0)) {
                return $this->error("You are not a captain");
            }
            $item = RequiredDocument::where('captain_id', auth('sanctum')->id())->first();
            if (!isset($item)) {
                return $this->error('Docs not found', 404);
            }
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }

    }
}
