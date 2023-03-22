<?php

namespace App\Interfaces;

use App\Models\User;

interface PaymentService
{
    public function pay(User $user, int $total): int;
}
