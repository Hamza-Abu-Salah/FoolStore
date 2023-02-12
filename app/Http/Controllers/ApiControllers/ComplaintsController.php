<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    public function store(Request $request, $id)
    {
        try {
            Store::findOrFail($id);
            $item = Complaint::create([
                'complainer_id' => auth('sanctum')->id(),
                'store_id' => $id,
                'title' => $request->post('title'),
                'message' => $request->post('message')
            ]);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function captain(Request $request, $id)
    {
        try {
            User::where('is_captain', 1)->findOrFail($id);
            $item = Complaint::create([
                'complainer_id' => auth('sanctum')->id(),
                'captain_id' => $id,
                'title' => $request->post('title'),
                'message' => $request->post('message')
            ]);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function user(Request $request, $id)
    {
        try {
            User::where('is_captain', 0)->findOrFail($id);
            $item = Complaint::create([
                'complainer_id' => auth('sanctum')->id(),
                'user_id' => $id,
                'title' => $request->post('title'),
                'message' => $request->post('message')
            ]);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function all()
    {
        try {
            $items = Complaint::query()
                ->with('user', 'store', 'captain')
                ->where('complainer_id', auth('sanctum')->id())
                ->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function stores()
    {
        try {
            $items = Complaint::query()
                ->with('store')
                ->where('store_id', '!=', null)
                ->where('complainer_id', auth('sanctum')->id())
                ->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function captains()
    {
        try {
            $items = Complaint::query()
                ->with('captain')
                ->where('captain_id', '!=', null)
                ->where('complainer_id', auth('sanctum')->id())
                ->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function users()
    {
        try {
            $items = Complaint::query()
                ->with('user')
                ->where('user_id', '!=', null)
                ->where('complainer_id', auth('sanctum')->id())
                ->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function single($id)
    {
        try {
            $item = Complaint::query()
                ->with('user', 'store', 'captain')
                ->where('complainer_id', auth('sanctum')->id())
                ->findOrFail($id);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
