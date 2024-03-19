<?php

namespace App\Imports;

use App\Models\Team;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeamsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = [
            'id' => $row['id'],
            'team_name' => $row['team_name'],
            'logo' => $row['logo'],
            'game' => $row['game'],
            'status' => $row['status'],
            'label' => $row['label'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        // Ensure unique combination of user_id and game_id
        Team::updateOrInsert(
            ['id' => $row['id'], 'game' => $row['game']],
            $data
        );

        // Return null as the import has been handled
        return null;
    }
}
