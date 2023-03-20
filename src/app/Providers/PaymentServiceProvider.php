<?php

namespace App\Providers;

use App\Interfaces\PaymentService;
use App\Util\BitcoinPaymentService;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PaymentService::class, function () {
            return new BitcoinPaymentService();
        });
    }
}
