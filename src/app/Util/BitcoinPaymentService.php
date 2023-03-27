<?php

namespace App\Util;

use App\Enums\PaymentMessagesEnum;
use App\Interfaces\PaymentService;
use App\Models\User;

class BitcoinPaymentService implements PaymentService
{
    public function pay(User $user, int $total): int
    {
        $newBalance = $user->getBalance() - $total;
        if ($newBalance < 0) {
            return PaymentMessagesEnum::ERROR_NO_FUNDS->value;
        }
        $user->setBalance($newBalance);
        $user->save();

        return PaymentMessagesEnum::SUCCESS->value;
    }
}
