<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    public function store(Request $request, $id)
    {
        try {
            Store::findOrFail($id);
            $item = Rate::where('rater_id', auth('sanctum')->id())
                ->where('store_id', $id)->first();
            if (isset($item)) {
                $item->update([
                    'stars' => $request->post('stars'),
                ]);
            } else {
                $item = Rate::create([
                    'rater_id' => auth('sanctum')->id(),
                    'store_id' => $id,
                    'stars' => $request->post('stars'),
                ]);
            }
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function captain(Request $request, $id)
    {
        try {
            User::where('is_captain', 1)->findOrFail($id);
            $item = Rate::where('rater_id', auth('sanctum')->id())
                ->where('captain_id', $id)->first();
            if (isset($item)) {
                $item->update([
                    'stars' => $request->post('stars'),
                ]);
            } else {
                $item = Rate::create([
                    'rater_id' => auth('sanctum')->id(),
                    'captain_id' => $id,
                    'stars' => $request->post('stars'),
                ]);
            }
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function user(Request $request, $id)
    {
        try {
            User::where('is_captain', 0)->findOrFail($id);
            $item = Rate::where('rater_id', auth('sanctum')->id())
                ->where('user_id', $id)->first();
            if (isset($item)) {
                $item->update([
                    'stars' => $request->post('stars'),
                ]);
            } else {
                $item = Rate::create([
                    'rater_id' => auth('sanctum')->id(),
                    'user_id' => $id,
                    'stars' => $request->post('stars'),
                ]);
            }
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function all()
    {
        try {
            $items = Rate::query()
                ->with('user', 'store', 'captain')
                ->where('rater_id', auth('sanctum')->id())
                ->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function stores()
    {
        try {
            $items = Rate::query()
                ->with('store')
                ->where('store_id', '!=', null)
                ->where('rater_id', auth('sanctum')->id())
                ->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function captains()
    {
        try {
            $items = Rate::query()
                ->with('captain')
                ->where('captain_id', '!=', null)
                ->where('rater_id', auth('sanctum')->id())
                ->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function users()
    {
        try {
            $items = Rate::query()
                ->with('user')
                ->where('user_id', '!=', null)
                ->where('rater_id', auth('sanctum')->id())
                ->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function single($id)
    {
        try {
            $item = Rate::query()
                ->with('user', 'store', 'captain')
                ->where('rater_id', auth('sanctum')->id())
                ->findOrFail($id);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
