<?php

namespace Database\Seeders;

use App\Models\Bomb;
use App\Models\BombOrder;
use App\Models\BombUser;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(50)->create();
        $bombs = Bomb::factory(40)->create();

        foreach ($users as $user) {
            $randomBombs = $bombs->random(8);
            foreach ($randomBombs as $bomb) {
                // add reviews
                Review::factory()->create([
                    'bomb_id' => $bomb->getId(),
                    'user_id' => $user->getId(),
                ]);
            }

            // add Order
            $order = Order::factory()->create([
                'user_id' => $user->getId(),
            ]);

            $randomBombs = $bombs->random(10);
            foreach ($randomBombs as $bomb) {
                // add bombuser relations
                BombUser::factory()->create([
                    'bomb_id' => $bomb->getId(),
                    'user_id' => $user->getId(),
                ]);

                // add bombOrder
                BombOrder::factory()->create([
                    'order_id' => $order->getId(),
                    'bomb_id' => $bomb->getId(),
                ]);
            }
        }
    }
}
