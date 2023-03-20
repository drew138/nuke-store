<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    public function index(): View
    {
        $data = [];
        $data['orders'] = Order::with('user')->get();

        return view('admin.orders.index')->with('data', $data);
    }

    public function create(): View
    {
        $data = [];

        return view('admin.orders.create')->with('data', $data);
    }

    public function save(Request $request): RedirectResponse
    {
        Order::validateRequest($request);
        $creationData = $request->only(['is_shipped', 'total']);
        Order::create($creationData);

        return back()->withSuccess(__('orders.created_successfully'));
    }

    public function ship(Request $request): RedirectResponse
    {
        $order = Order::findOrFail($request['id']);
        $order->ship();

        return back();
    }

    public function cancelShip(Request $request): RedirectResponse
    {
        $order = Order::findOrFail($request['id']);
        $order->cancelShip();

        return back();
    }
}
