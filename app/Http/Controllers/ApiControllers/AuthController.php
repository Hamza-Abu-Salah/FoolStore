<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function is_user_found(Request $request)
    {
        try {
            $request->validate([
                'phone' => 'required|min:8',
            ]);
            $user = User::where('phone', $request->post('phone'))->first();
            if (!isset($user)) {
                return $this->error('User Not Found', 404);
            }
            return $this->success('User Found');
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $request->validate([
                'phone' => 'required|min:8',
            ]);
            $user = User::where('phone', $request->post('phone'))->first();
            if (!isset($user)) {
                return $this->error('User Not Found', 404);
            }
            if (!Auth::loginUsingId($user->id)) {
                return $this->error('Credentials not match');
            }
            $token = auth()->user()->createToken('API Token')->plainTextToken;
            return $this->success(['token' => $token, 'user' => $user]);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'phone' => 'required|min:8|unique:users,phone',
                'is_captain' => 'required|boolean',
            ]);
            if ($request->hasFile('avatar')) {
                $avatar = $this->uploadFile($request->file('avatar'), 'uploads/users/pictures');
                $user = User::create([
                    'phone' => $request->post('phone'),
                    'name' => $request->post('name'),
                    'email' => $request->post('email'),
                    'gender' => $request->has('gender')?? "1",
                    'avatar' => $avatar,
                    'is_identity_verified' => 1,
                    'is_captain' => $request->post('is_captain'),
                    'longitude' => $request->post('longitude'),
                    'latitude' => $request->post('latitude'),
                    'status' => !$request->post('is_captain'),
                ]);
            } else {
                $user = User::create([
                    'phone' => $request->post('phone'),
                    'name' => $request->post('name'),
                    'email' => $request->post('email'),
                    'gender' => $request->post('gender')?? "1",
                    'is_identity_verified' => 1,
                    'is_captain' => $request->post('is_captain'),
                    'status' => !$request->post('is_captain'),
                ]);
            }
            if (!Auth::loginUsingId($user->id)) {
                return $this->error('Credentials not match');
            }
            $token = auth()->user()->createToken('API Token')->plainTextToken;
            return $this->success(['token' => $token]);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function me(): \Illuminate\Http\JsonResponse
    {
        try {
            $user = auth('sanctum')->user();
            return $this->success($user);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function complete_register(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = User::findOrFail(auth('sanctum')->id());
            return $this->success($user);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function logout(): \Illuminate\Http\JsonResponse
    {
        try {
            auth('sanctum')->user()->currentAccessToken()->delete();
            return $this->success('Logout successfully completed');
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function all_devices_logout(): \Illuminate\Http\JsonResponse
    {
        try {
            auth('sanctum')->user()->tokens()->delete();
            return $this->success('All devices logout successfully completed');
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }
}
