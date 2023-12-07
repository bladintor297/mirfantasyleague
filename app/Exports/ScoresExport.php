<?php

namespace App\Exports;

use App\Models\Score;
use Maatwebsite\Excel\Concerns\FromCollection;

class ScoresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Score::select("user_id", "game_id", "day1", "day2", "day3", "day4", "day5", "day6", "created_at", "updated_at")->get();
    }

    public function headings(): array
    {
        return ["user_id", "game_id", "day1", "day2", "day3", "day4", "day5", "day6", "created_at", "updated_at"];
    }
}
