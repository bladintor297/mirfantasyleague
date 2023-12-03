<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Score;


class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = [1, 2, 22, 25, 28, 24, 30, 27, 26, 29, 31];

        $dayValues = [
            [73.16, 79.33, 71.04],
            [68.40, 82.13, 70.28],
            [49.88, 94.80, 57.00],
            [51.88, 92.47, 51.80],
            [49.88, 94.40, 51.20],
            [45.84, 88.33, 57.92],
            [66.68, 82.13, 43.20],
            [43.68, 84.73, 59.80],
            [60.08, 83.13, 44.60],
            [49.88, 84.33, 52.60],
            [49.88, 77.40, 59.20],
        ];

        $gameId = 1; // You can adjust this based on your game_id logic

        // Loop through user_ids and dayValues to create seed data
        foreach ($userIds as $userId) {
            Score::create([
                'user_id' => $userId,
                'game_id' => $gameId,
                'day1' => $dayValues[$userId % count($dayValues)][0],
                'day2' => $dayValues[$userId % count($dayValues)][1],
                'day3' => $dayValues[$userId % count($dayValues)][2],
            ]);
        }
    }
}
