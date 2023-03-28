<?php

namespace App\Http\Controllers\User;

use App\Enums\PaymentMessagesEnum;
use App\Http\Controllers\Controller;
use App\Interfaces\PaymentService;
use App\Models\Bomb;
use App\Models\BombOrder;
use App\Models\BombUser;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $shoppingData = $request->session()->get('shopping_cart');

        $user = Auth::user();
        $bombs = Bomb::findMany(array_keys($shoppingData));
        $total = Order::calculateTotal($bombs, $shoppingData);
        if ($total == PaymentMessagesEnum::ERROR_NO_STOCK->value) {
            return redirect()->back()->withErrors(__('orders.no_stock'));
        }
        $paymentInterface = app(PaymentService::class);
        $paymentMessage = $paymentInterface->pay($user, $total);
        if ($paymentMessage == PaymentMessagesEnum::ERROR_NO_FUNDS->value) {
            return redirect()->back()->withErrors(__('orders.no_funds'));
        }
        session()->put('shopping_cart', []);

        $order = Order::create([
            'user_id' => $user->getId(),
            'total' => $total,
        ]);

        foreach ($bombs as $bomb) {
            $amount = $shoppingData[$bomb->getId()];

            BombOrder::create([
                'amount' => $amount,
                'bomb_id' => $bomb->getId(),
                'order_id' => $order->getId(),
            ]);

            $bombUser = BombUser::findOrCreate($user->getId(), $bomb->getId());
            $bombUser->setAmount($bombUser->getAmount() + $amount);
            $bombUser->save();
            $bomb->setStock($bomb->getStock() - $amount);
            $bomb->save();
        }

        return redirect()->route('orders.index')->withSuccess(__('orders.completed'));
    }
}
