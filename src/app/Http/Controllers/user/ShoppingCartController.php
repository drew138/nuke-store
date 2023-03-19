<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Bomb;
use App\Models\BombOrder;
use App\Models\BombUser;
use App\Models\Order;
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
        $user = $request->user();
        $cart_data = $request->session()->get('shopping_cart');
        $bombs = Bomb::findMany($cart_data);
        $total = 0;
        foreach ($bombs as $bomb) {
            $amount = $cart_data[$bomb->getId()];
            $total += $amount * $bomb->getPrice();
        }
        $newBalance = $user->getBalance() - $total;
        if ($newBalance < 0) {
            return redirect()->back()->withErrors(['Not enough funds']);
        }
        $orderData = [
            'user_id' => $user->getId(),
            'total' => $total
        ];
        $order = Order::create($orderData);
        foreach ($bombs as $bomb) {
            $amount = $cart_data[$bomb->getId()];
            $bombCartData = [
                'amount' => $amount,
                'bomb_id' => $bomb->getId(),
                'order_id' => $order->getId()
            ];
            BombOrder::create($bombCartData);
            $bombUser = BombUser::findOrCreate($user->getId(), $bomb->getId());
            $bombUser->save();
            $bombUser->setAmount($bombUser->getAmount() + $amount);
            $bombUser->save();
            $bomb->setStock($bomb->getStock() - $amount);
            $bomb->save();
        }
        $user->setBalance($newBalance);
        $user->save();
        $request->session()->put('shopping_cart', []);
        return redirect()->route('shopping_cart.confirm', ['order_id' => $order->getId()]);
    }

    public function confirm(int $order_id): View
    {
        $data = [];
        $data['order'] = Order::findOrFail($order_id);
        return view('user.shopping_cart.confirm');
    }
}