<?php

namespace App\Util;

use App\Enums\PaymentMessagesEnum;
use App\Interfaces\PaymentService;
use App\Models\Bomb;
use App\Models\BombOrder;
use App\Models\BombUser;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BitcoinPaymentService implements PaymentService
{
    public function pay(Request $request): int
    {
        $shoppingData = $request->session()->get('shopping_cart');

        $user = Auth::user();
        $bombs = Bomb::findMany(array_keys($shoppingData));

        $total = 0;
        foreach ($bombs as $bomb) {
            $amount = $shoppingData[$bomb->getId()];
            if ($bomb->getStock() - $amount < 0) {
                return PaymentMessagesEnum::ERROR_NO_STOCK->value;
            }
            $total += $amount * $bomb->getPrice();
        }

        $newBalance = $user->getBalance() - $total;

        if ($newBalance < 0) {
            return PaymentMessagesEnum::ERROR_NO_FUNDS->value;
        }

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

        $user->setBalance($newBalance);
        $user->save();

        return PaymentMessagesEnum::SUCCESS->value;
    }
}
