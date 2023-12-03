<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyTeam extends Model
{
    use HasFactory;

    protected $table = 'myteam';

    public $primaryKey = 'id';

    protected $fillable = [
        'user',
        'game',
        'EXP_Laner',
        'Jungler',
        'Mid_Laner',
        'Gold_Laner',
        'Roamer',
        'Reserve_1',
        'Reserve_2',
        'Reserve_3',
        'Reserve_4',
        'Reserve_5',
    ];
}
