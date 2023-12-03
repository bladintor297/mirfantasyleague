<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'game';

    public $primaryKey = 'id';

    public function league()
    {
        return $this->belongsTo(League::class, 'league_id');
    }


}
