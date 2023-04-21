<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Util\BitcoinPaymentService;
use App\Enums\PaymentMessagesEnum;
use App\Models\User;

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
