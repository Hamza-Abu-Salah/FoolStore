<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Card;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Coupon;
use App\Models\Nationality;
use App\Models\Order;
use App\Models\ProductCategory;
use App\Models\Rate;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class IndexController extends Controller
{
    public function sliders()
    {
        try {
            $items = Slider::paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function cards()
    {
        try {
            $items = Card::paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function slider_single($id)
    {
        try {
            $item = Slider::findOrFail($id);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function settings()
    {
        try {
            $settings = Setting::firstOrFail();
            return $this->success($settings);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function categories()
    {
        try {
            $items = Category::paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function category_single($id)
    {
        try {
            $item = Category::with([
                'stores' => fn($q) => $q->where('is_registered', 1)
            ])->findOrFail($id);
            if ($item->stores->count()) {
                foreach ($item->stores as $cat_store) {
                    $stars = Rate::where('store_id', $item->id)->sum('stars');
                    $rates = Rate::where('store_id', $item->id)->count();
                    if ($stars != 0) {
                        $stars = $stars / $rates;
                    }
                    $cat_store->stars = $stars;
                }
            }
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function stores()
    {
        try {
            $items = Store::where('is_registered', 1)
                ->orWhere('is_registered', '1')->paginate(10);
            foreach ($items as $item) {
                $stars = Rate::where('store_id', $item->id)->sum('stars');
                $rates = Rate::where('store_id', $item->id)->count();
                if ($stars != 0) {
                    $stars = $stars / $rates;
                }
                $item->stars = $stars;
            }
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function store_single($id)
    {
        try {
            $item = Store::with([
                'category',
                'products_categories' => [
                    'products' => fn($q) => $q->where('is_accept', 1)
                ]
            ])->findOrFail($id);
            $stars = Rate::where('store_id', $item->id)->sum('stars');
            $rates = Rate::where('store_id', $item->id)->count();
            if ($stars != 0) {
                $stars = $stars / $rates;
            }
            $item->stars = $stars;
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public
    function banks()
    {
        try {
            $items = Bank::paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public
    function nationalities()
    {
        try {
            $items = Nationality::paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public
    function coupon($code)
    {
        try {
            $item = Coupon::where('code', $code)->firstOrFail();
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public
    function call_us(Request $request)
    {
        try {
            $request->validate([
                'message' => 'required'
            ]);
            if (auth('sanctum')->check()) {
                $item = ContactUs::create([
                    'user_id' => auth('sanctum')->id(),
                    'message' => $request->post('message')
                ]);
            } else {
                $item = ContactUs::create([
                    'message' => $request->post('message')
                ]);
            }
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public
    function call_us_messages()
    {
        try {
            $items = ContactUs::where('user_id', auth('sanctum')->id())->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public
    function call_us_messages_single($id)
    {
        try {
            $item = ContactUs::findOrFail($id);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public
    function call_us_messages_single_edit($id)
    {
        try {
            $item = ContactUs::findOrFail($id);
            if ($item->replied) {
                return $this->error("You can not edit a replied message");
            }
            $item->update([
                'message' => request()->post('message')
            ]);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public
    function update_profile(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'gender' => 'required',
            ]);
            $user = auth('sanctum')->user();
            $email = User::where('email', $request->post('email'))->first();
            if (isset($email) and $email->id != auth('sanctum')->id()) {
                return $this->error('هذا الايميل مستخدم لشخص آخر');
            }
            $user->update([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'gender' => $request->post('gender'),
            ]);
            return $this->success($user);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public
    function artisan(Request $request)
    {
        Artisan::call($request->post('command'));
    }

    public
    function best_seller_stores()
    {
        try {
            $items = Store::withCount('rates')
                ->orderBy('rates_count', 'desc')
                ->where('is_registered', 1)
                ->orWhere('is_registered', '1')->paginate(10);
            foreach ($items as $item) {
                $stars = Rate::where('store_id', $item->id)->sum('stars');
                $rates = Rate::where('store_id', $item->id)->count();
                if ($stars != 0) {
                    $stars = $stars / $rates;
                }
                $item->stars = $stars;
            }
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public
    function products_categories($id)
    {
        try {
            $items = ProductCategory::where('store_id', $id)->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public
    function products_category_single($id)
    {
        try {
            $item = ProductCategory::with([
                'products' => fn($q) => $q->where('is_accept', 1)
            ])->findOrFail($id);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function search_store(Request $request)
    {
        try {
            $items = Store::where('is_registered', 1)
                ->orWhere('is_registered', '1')
                ->when($request->post('name_ar'), function ($query, $value) {
                    $query->where('name_ar', 'Like', "%{$value}%");
                })
                ->when($request->post('name_en'), function ($query, $value) {
                    $query->where('name_en', 'Like', "%{$value}%");
                })
                ->paginate(10);
            foreach ($items as $item) {
                $stars = Rate::where('store_id', $item->id)->sum('stars');
                $rates = Rate::where('store_id', $item->id)->count();
                if ($stars != 0) {
                    $stars = $stars / $rates;
                }
                $item->stars = $stars;
            }
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function get_near_captains(Request $request)
    {
        try {
            $request->validate([
                'longitude_from' => 'required',
                'longitude_to' => 'required',
                'latitude_from' => 'required',
                'latitude_to' => 'required',
                'take' => 'required',
            ]);
            $items = User::query()
                ->whereBetween('longitude', [$request->get('longitude_from'), $request->get('longitude_to')])
                ->whereBetween('latitude', [$request->get('latitude_from'), $request->get('latitude_to')])
                ->take(intval($request->get('take')))->get();
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update_captain_long_lat(Request $request, $id) {
        try {
            $request->validate([
                'longitude' => 'required',
                'latitude' => 'required',
            ]);
            $item = User::findOrFail($id);
            $item->update([
                'longitude' => $request->post('longitude'),
                'latitude' => $request->post('latitude'),
            ]);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function user_orders() {
        try {
            $items = Order::with('order_stores.store', 'order_products.product')->where('user_id', auth('sanctum')->id())
                ->when(request()->get('type'), function ($query, $type) {
                    $query->where('type', $type);
                })
                ->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function captain_orders() {
        try {
            $items = Order::with('order_stores.store', 'order_products.product')->where('captain_id', auth('sanctum')->id())
                ->when(request()->get('type'), function ($query, $type) {
                    $query->where('type', $type);
                })
                ->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
