<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PaymentService
{
    public function pay(Request $request): int;
}
