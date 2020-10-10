<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function players() {
        return $this->hasMany('App\Models\Player');
    }

    public function countPlayers() {
        return $this->hasMany('App\Models\Player')->whereNotNull('team_id')->count();
    }
}
