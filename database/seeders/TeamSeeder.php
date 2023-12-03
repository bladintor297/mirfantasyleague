<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Team;


class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createMultipleTeams  = [
            ['team_name' => 'Imperio E-Sport', 'logo' => 'https://drive.google.com/uc?export=view&id=1bfubMrYjpXl1EXJxiH39tErXj3tyNTqg'],
            ['team_name' => 'Team SMG', 'logo' => 'https://drive.google.com/uc?export=view&id=1s0B9gxpWnMepZadAdC96BbPAaI5ynGrR'],
            ['team_name' => 'Umbrella Squad', 'logo' => 'https://drive.google.com/uc?export=view&id=1MEFVZZe9nuuVuQMDQt_wcx7SYM6vBxSg'],
            ['team_name' => '4Merical Esports', 'logo' => 'https://drive.google.com/uc?export=view&id=1gNQ7C54avSnFxXiL26tPoUMaw4AzV6Q_'],
            ['team_name' => 'Niightmare Esports', 'logo' => 'https://drive.google.com/uc?export=view&id=101TaXGhhpXvHkjwHVYzpl5t2kvYZLASX'],
            ['team_name' => 'Team Lilgun', 'logo' => 'https://drive.google.com/uc?export=view&id=1uBv-uPHYUbbYRxrTWFTTRlos5cuvgDzA'],
            ['team_name' => 'Team Falcons', 'logo' => 'https://drive.google.com/uc?export=view&id=1ICOSORoPb7VzZuxSEhIX8gcOQ50d3OIR'],
            ['team_name' => 'KeepBest Gaming', 'logo' => 'https://drive.google.com/uc?export=view&id=12PmMHsUEPosOE6T_vNBI-cMG0FRmG-Xx'],
        ];

        Team::insert($createMultipleTeams);
    }
}
