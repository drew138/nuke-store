<?php

namespace App\Http\Controllers\user;

use App\Enums\PaymentMessagesEnum;
use App\Http\Controllers\Controller;
use App\Interfaces\PaymentService;
use App\Models\Bomb;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShoppingCartController extends Controller
{
    public function index(): View
    {
        $cart_data = session()->get('shopping_cart');
        $bombs = Bomb::findMany($cart_data);

        $data = [];
        $data['bombs'] = $bombs;

        return view('user.shopping_cart.index')->with('data', $data);
    }

    public function delete(Request $request): RedirectResponse
    {
        $id = $request['id'];

        $cart_data = $request->session()->get('shopping_cart');
        unset($cart_data[$id]);
        $request->session()->put('shopping_cart', $cart_data);

        return redirect()->back();
    }

    public function add(Request $request): RedirectResponse
    {
        $id = $request['id'];

        $cart_data = $request->session()->get('shopping_cart');
        $cart_data[$id] = $id;
        $request->session()->put('shopping_cart', $cart_data);

        return redirect()->back();
    }

    public function buy(Request $request): RedirectResponse
    {
        $payment_interface = app(PaymentService::class);
        $payment_message = $payment_interface->pay($request);

        switch ($payment_message) {
            case PaymentMessagesEnum::SUCCESS->value:
                session()->put('shopping_cart', []);
                // Return to user orders with a success message
                return redirect()->route('orders.index')->withSuccess('adsadadasdda');

            case PaymentMessagesEnum::ERROR_NO_FUNDS->value:
                return redirect()->back()->withErrors('nofunds');

            case PaymentMessagesEnum::ERROR_NO_STOCK->value:
                return redirect()->back()->withErrors('nostock');

            default:
                return redirect()->back();
        }
    }
}
