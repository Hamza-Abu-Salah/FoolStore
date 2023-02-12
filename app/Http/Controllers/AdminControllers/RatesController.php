<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Rate;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    public function stores()
    {
        $items = Store::with('rates')->where('is_registered', 1)->orderBy('id', 'desc')->take(700)->get();
        foreach ($items as $item) {
            $order = Order::orderBy('id', 'desc')->where('store_id', $item->id)->first();
            $item->last_order = null;
            if (isset($order)) $item->last_order = $order->created_at;
            $stars = 0;
            $rates = [];
            if ($item->rates->count()) $rates = $item->rates;
            foreach ($rates as $rate) {
                $stars += $rate->stars;
            }
            $rate = 0;
            if ($stars != 0) {
                $rate = $stars / $rates->count();
            }
            $item->rate = intval($rate);
        }
        return view('dashboard.pages.rates.stores', compact('items'));
    }

    public function captains()
    {
        $items = User::with('captain_rates')->withCount('orders')->orderBy('id', 'desc')->where('is_captain', 1)->take(700)->get();
        foreach ($items as $item) {
            $order = Order::orderBy('id', 'desc')->where('captain_id', $item->id)->first();
            $item->last_order = null;
            if (isset($order)) $item->last_order = $order->created_at;
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
        return view('dashboard.pages.rates.captains', compact('items'));
    }

    public function users()
    {
        $items = User::with('user_rates')->withCount('orders')->orderBy('id', 'desc')->where('is_captain', 0)->take(700)->get();
        foreach ($items as $item) {
            $order = Order::orderBy('id', 'desc')->where('user_id', $item->id)->first();
            $item->last_order = null;
            if (isset($order)) $item->last_order = $order->created_at;
            $stars = 0;
            $rates = [];
            if ($item->user_rates->count()) $rates = $item->user_rates;
            foreach ($rates as $rate) {
                $stars += $rate->stars;
            }
            $rate = 0;
            if ($stars != 0) {
                $rate = $stars / $rates->count();
            }
            $item->rate = intval($rate);
        }
        return view('dashboard.pages.rates.users', compact('items'));
    }
}
