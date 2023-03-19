<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bomb;
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
        $users = User::factory(10)->create();
        $bombs = Bomb::factory(10)->create();
        foreach ($bombs as $bomb) {
            foreach ($users as $user) {
                // add reviews
                Review::factory()->create([
                    'bomb_id' => $bomb->getId(),
                    'user_id' => $user->getId(),
                ]);
                // add user-bomb relations
                // $user->addBomb($bomb->getId(), rand(1, 100));
            }
        }
    }
}
