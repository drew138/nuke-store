<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bomb;
use App\Models\BombUser;
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
        $users = User::factory(15)->create();
        $bombs = Bomb::factory(15)->create();
        foreach ($bombs as $bomb) {
            foreach ($users as $user) {
                // add reviews
                Review::factory()->create([
                    'bomb_id' => $bomb->getId(),
                    'user_id' => $user->getId(),
                ]);
                   
                // add bombuser relations
                BombUser::factory()->create([
                    'bomb_id' => $bomb->getId(),
                    'user_id' => $user->getId(),
                ]);
            }
        }
    }
}
