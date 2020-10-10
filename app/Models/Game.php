<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'team_a_id',
        'team_b_id',
        'score_team_a',
        'score_team_b',
        'tie',
    ];

    public function teamA() {
        return $this->hasOne('App\Models\Team', 'id', 'team_a_id');
    }

    public function teamB() {
        return $this->hasOne('App\Models\Team', 'id', 'team_b_id');
    }

    public function cards() {
        return $this->hasMany('App\Models\Card');
    }
}
