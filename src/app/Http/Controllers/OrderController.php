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
        return view('orders.index')->with("data", $data);
    }

    public function create(): View
    {
        return view('orders.create');
    }

    public function save(Request $request): View
    {
        $request->validate([
            "total" => ["required", "integer", "min:0"],
        ]);
        Order::create($request->only(["is_shipped", "total"]));
        return view('orders.create');
    }

    public function show(string $id): View
    {
        $data = [];
        $order = Order::findOrFail($id);
        $data["order"] = $order;
        return view('orders.show')->with("data", $data);
    }

    public function destroy(Request $request): View|RedirectResponse
    {
        $request->validate([
            'id' => 'gte:0',    // Greater than 0
        ]);
        Order::destroy($request->only(['id']));
        return redirect()->route('orders.index');
    }
}
