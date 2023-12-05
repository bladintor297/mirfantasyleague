<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $table = 'league';

    public $primaryKey = 'id';

    public function games()
    {
        return $this->hasMany(Game::class, 'league_id');
    }

}
