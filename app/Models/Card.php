<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'player_id',
        'red_card',
        'yellow_card',
    ];

    public function game() {
        return $this->belongsTo('App\Models\Game');
    }

    public function player() {
        return $this->belongsTo('App\Models\Player');
    }
}
