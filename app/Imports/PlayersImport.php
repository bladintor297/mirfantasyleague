<?php

namespace App\Imports;

use App\Models\Player;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PlayersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $scoreArray = [
            $row['score1'],
            $row['score2'],
            $row['score3'],
            $row['score4'],
            $row['score5'],
            $row['score6'],
        ];

        $data = [
            'id' => $row['id'],
            'name' => $row['name'],
            'team' => $row['team'],
            'nationality' => $row['nationality'],
            'picture' => $row['picture'],
            'role' => $row['role'],
            'score' => json_encode($scoreArray),
            'label' => $row['label'],
            'game' => $row['game'],
            'status' => $row['status'],
            'league' => $row['league'],
            'prev_rank' => $row['prev_rank'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        // Ensure unique combination of user_id and game_id
        Player::updateOrInsert(
            ['id' => $row['id'], 'game' => $row['game']],
            $data
        );

        // Return null as the import has been handled
        return null;
    }
}