<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $data = [];
        $data['orders'] = Order::all();

        return view('orders.index')->with('data', $data);
    }

    public function create(): View
    {
        $data = [];

        return view('orders.create')->with('data', $data);
    }

    public function save(Request $request): RedirectResponse
    {
        Order::validateRequest($request);
        $creationData = $request->only(['is_shipped', 'total']);
        Order::create($creationData);

        return back()->withSuccess(__('orders.created_successfully'));
    }

    public function show(string $id): View
    {
        $data = [];
        $order = Order::findOrFail($id);
        $data['order'] = $order;

        return view('orders.show')->with('data', $data);
    }

    public function destroy(string $id): RedirectResponse
    {
        Order::destroy($id);

        return redirect()->route('orders.index');
    }
}
