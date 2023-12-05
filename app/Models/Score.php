<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $table = 'score';

    public $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'game_id',
        'day1',
        'day2',
        'day3',
        'day4',
        'day5',
        'day6',
    ];
}
