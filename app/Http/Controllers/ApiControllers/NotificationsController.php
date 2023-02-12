<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function all() {
        try {
            $items = Notification::where('user_id', auth('sanctum')->id())->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function single($id) {
        try {
            $item = Notification::findOrFail($id);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function send(Request $request) {
        try {
            $request->validate([
                'message' => 'required',
                'user_id' => 'required'
            ]);
            User::findOrFail($request->post('user_id'));
            $item = Notification::create([
                'user_id' => $request->post('user_id'),
                'message' => $request->post('message'),
                'is_read' => 0,
            ]);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function read($id) {
        try {
            $item = Notification::findOrFail($id);
            $item->update([
                'is_read' => 1,
            ]);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
