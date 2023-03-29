<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use PDF;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('bombOrders.bomb')->where('user_id', '=', Auth::id())->get();

        $data = [];
        $data['orders'] = $orders;

        return view('user.orders.index')->with('data', $data);
    }

    public function save(Request $request): RedirectResponse
    {
        Order::validateRequest($request);
        $creationData = $request->only(['is_shipped', 'total']);
        Order::create($creationData);

        return back()->withSuccess(__('orders.created_successfully'));
    }

    public function download(string $orderId): Response
    {
        $order = Order::with('bombOrders.bomb')->findOrFail($orderId);
        $data = [];
        $total = $order->getTotal();
        $data['bombOrders'] = $order->getBombOrders();
        $data['total'] = $total;
        $data['date'] = Carbon::now();

        $pdf = PDF::loadView('user.orders.bill', $data);

        return $pdf->download($order->getId().'_'.$order->getUser()->getName().'.pdf');
    }
}
