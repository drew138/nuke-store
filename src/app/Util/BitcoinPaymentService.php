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
        $shopping_data = $request->except('_token', '_method');
        $user = Auth::user();
        $bombs = Bomb::findMany(array_keys($shopping_data));

        $total = 0;
        foreach ($bombs as $bomb) {
            $amount = $shopping_data[$bomb->getId()];
            if ($bomb->getStock() - $amount < 0) {
                return PaymentMessagesEnum::ERROR_NO_STOCK->value;
            }
            $total += $amount * $bomb->getPrice();
        }

        $new_balance = $user->getBalance() - $total;

        if ($new_balance < 0) {
            return PaymentMessagesEnum::ERROR_NO_FUNDS->value;
        }

        $order = Order::create([
            'user_id' => $user->getId(),
            'total' => $total,
        ]);

        foreach ($bombs as $bomb) {
            $amount = $shopping_data[$bomb->getId()];

            BombOrder::create([
                'amount' => $amount,
                'bomb_id' => $bomb->getId(),
                'order_id' => $order->getId(),
            ]);

            $bomb_user = BombUser::findOrCreate($user->getId(), $bomb->getId());
            $bomb_user->save();
            $bomb_user->setAmount($bomb_user->getAmount() + $amount);
            $bomb_user->save();
            $bomb->setStock($bomb->getStock() - $amount);
            $bomb->save();
        }

        $user->setBalance($new_balance);
        $user->save();

        return PaymentMessagesEnum::SUCCESS->value;
    }
}
