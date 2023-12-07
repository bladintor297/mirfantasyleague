<?php

namespace App\Imports;

use App\Models\Score;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ScoresImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = [
            'user_id' => $row['user_id'],
            'game_id' => $row['game_id'],
            'day1' => $row['day1'],
            'day2' => $row['day2'],
            'day3' => $row['day3'],
            'day4' => $row['day4'],
            'day5' => $row['day5'],
            'day6' => $row['day6'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        // Ensure unique combination of user_id and game_id
        Score::updateOrInsert(
            ['user_id' => $row['user_id'], 'game_id' => $row['game_id']],
            $data
        );

        // Return null as the import has been handled
        return null;
    }
}