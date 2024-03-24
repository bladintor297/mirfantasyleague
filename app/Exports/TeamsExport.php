<?php

namespace App\Exports;

use App\Models\MyTeam;
use App\Models\Game;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TeamsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MyTeam::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'id',
            'label',
            'user',
            'game',
            'isCompleted',
            'term_isRead',
            'EXPLaner',
            'Jungler',
            'MidLaner',
            'GoldLaner',
            'Roamer',
            'Reserve_1',
            'Reserve_2',
            'Reserve_3',
            'Reserve_4',
            'Reserve_5',
            'captain',
            'vice_captain',
            'created_at',
            'updated_at'
        ];
    }
}
