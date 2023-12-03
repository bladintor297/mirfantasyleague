<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';

    public $primaryKey = 'id';

    protected $fillable = [
        'team_name',
        'logo',
    ];
}
