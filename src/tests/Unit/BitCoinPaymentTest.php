<?php

namespace Tests\Unit;

use App\Enums\PaymentMessagesEnum;
use App\Models\User;
use App\Util\BitcoinPaymentService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BitCoinPaymentTest extends TestCase
{
    use RefreshDatabase;

    public function testPaymentSuccess(): void
    {
        $user = User::factory()->create();
        $paymentService = new BitcoinPaymentService();
        $this->assertTrue($paymentService->pay($user, 1) == PaymentMessagesEnum::SUCCESS->value);
    }

    public function testPaymentFailure(): void
    {
        $user = User::factory()->create();
        $paymentService = new BitcoinPaymentService();
        $this->assertTrue($paymentService->pay($user, 5000000) == PaymentMessagesEnum::ERROR_NO_FUNDS->value);
    }
}
