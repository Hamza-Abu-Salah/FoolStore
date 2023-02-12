<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\CaptainOrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderStore;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function send(Request $request) {
        try {
            $request->validate([
                'type' => 'required',
                'price' => 'required'
            ]);
            // return $request->all();
            $order = Order::create([
                'user_id' => auth('sanctum')->id(),
                'status' => 1,
                'price' => $request->post('price')
            ]);
            if ($request->has('stores') and count($request->post('stores'))) {
                foreach ($request->post('stores') as $store) {
                    $get_store = Store::find($store['id']);
                    if (isset($get_store)) {
                        $order_store = OrderStore::create([
                            'user_id' => auth('sanctum')->id(),
                            'order_id' => $order->id,
                            'store_id' => $store['id'],
                            'price' => $store['price'],
                        ]);
                        if ($store['products']) {
                            foreach ($store['products'] as $product) {
                                OrderProduct::create([
                                    'product_id' => $product['id'],
                                    'order_id' => $order->id,
                                    'order_store_id' => $order_store->id,
                                    'amount' => $product['amount'],
                                    'price' => $product['price'],
                                ]);
                            }
                        }
                    }
                }
            }
            return Order::with('order_stores.store', 'order_products.product')->findOrFail($order->id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function get(Request $request) {
        try {
            $items = Order::with('order_stores.store', 'order_products.product')->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function single($id) {
        try {
            $item = Order::with('order_stores.store', 'order_products.product')->findOrFail($id);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function captain_request($order_id) {
        try {
            $order = Order::findOrFail($order_id);
            User::findOrFail($order->user_id);
            $request = CaptainOrderRequest::create([
                'order_id' => $order_id,
                'captain_id' => auth('sanctum')->id(),
                'user_id' => $order->user_id,
            ]);
            return $this->success($request);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function captain_request_accept($id) {
        try {
            $request = CaptainOrderRequest::findOrFail($id);
            $request->update([
                'status' => '1',
            ]);
            $order = Order::findOrFail($request->order_id);
            $order->update([
                'captain_id' => auth('sanctum')->id(),
            ]);
            return $this->success($request);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function captain_request_refuse($id) {
        try {
            $request = CaptainOrderRequest::findOrFail($id);
            $request->update([
                'status' => '2',
            ]);
            return $this->success($request);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function get_waiting_captain_request_for_user() {
        try {
            $items = CaptainOrderRequest::with('captain', 'order')->where('user_id', auth('sanctum')->id())->where('status', '0')->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function get_waiting_captain_request_for_captain() {
        try {
            $items = CaptainOrderRequest::with('order')->where('captain_id', auth('sanctum')->id())->where('status', '0')->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function get_all_captain_request_for_captain() {
        try {
            $items = CaptainOrderRequest::with('order')->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function get_all_captain_request_for_user() {
        try {
            $items = CaptainOrderRequest::with('captain', 'order')->paginate(10);
            return $this->success($items);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
