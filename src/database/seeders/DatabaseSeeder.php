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
        $bombs = User::factory(10)->create();
        $users = Bomb::factory(10)->create();
        foreach ($bombs as $bomb) {
            foreach ($users as $user) {
                Review::factory()->create([
                    'bomb_id' => $bomb->getId(),
                    'user_id' => $user->getId(),
                ]);
            }
        }
    }
}
