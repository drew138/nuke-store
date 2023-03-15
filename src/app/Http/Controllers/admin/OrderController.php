<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class OrderController extends Controller
{
    public function index(): View
    {
        $data = [];
        $data["orders"] = Order::all();
        return view('admin.orders.index')->with("data", $data);
    }

    public function create(): View
    {
        $data = [];
        return view('admin.orders.create')->with("data", $data);
    }

    public function save(Request $request): RedirectResponse
    {
        Order::validateRequest($request);
        $creationData = $request->only(["is_shipped", "total"]);
        Order::create($creationData);
        return back()->withSuccess(__('orders.created_successfully'));
    }

    public function show(string $id): View
    {
        $data = [];
        $order = Order::findOrFail($id);
        $data["order"] = $order;
        return view('admin.orders.show')->with("data", $data);
    }

    public function destroy(string $id): RedirectResponse
    {
        Order::destroy($id);
        return redirect()->route('admin.orders.index');
    }
}
