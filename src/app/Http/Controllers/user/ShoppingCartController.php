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
        $cartData = session()->get('shopping_cart');
        if (is_null($cartData)) {
            $cartData = [];
        }

        $bombs = Bomb::findMany(array_keys($cartData));

        $data = [];
        $data['bombs'] = $bombs;
        $data['cartData'] = $cartData;

        return view('user.shopping_cart.index')->with('data', $data);
    }

    public function delete(Request $request): RedirectResponse
    {
        $id = $request['id'];

        $cartData = $request->session()->get('shopping_cart');
        unset($cartData[$id]);
        $request->session()->put('shopping_cart', $cartData);

        return redirect()->back();
    }

    public function add(Request $request): RedirectResponse
    {
        $id = $request['id'];
        $amount = $request['amount'];

        $cartData = $request->session()->get('shopping_cart');
        $cartData[$id] = $amount;
        $request->session()->put('shopping_cart', $cartData);

        return redirect()->back();
    }

    public function buy(Request $request): RedirectResponse
    {
        $paymentInterface = app(PaymentService::class);
        $paymentMessage = $paymentInterface->pay($request);

        switch ($paymentMessage) {
            case PaymentMessagesEnum::SUCCESS->value:
                session()->put('shopping_cart', []);

                return redirect()->route('orders.index')->withSuccess(__('orders.completed'));

            case PaymentMessagesEnum::ERROR_NO_FUNDS->value:
                return redirect()->back()->withErrors(__('orders.no_funds'));

            case PaymentMessagesEnum::ERROR_NO_STOCK->value:
                return redirect()->back()->withErrors(__('orders.no_stock'));

            default:
                return redirect()->back();
        }
    }
}
