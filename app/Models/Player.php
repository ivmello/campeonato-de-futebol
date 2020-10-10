<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'name',
        'cpf',
        'tshirt_number',
        'score',
    ];

    public function team() {
        return $this->belongsTo('App\Models\Team');
    }

    public function cards() {
        return $this->hasMany('App\Models\Card');
    }

    public function score() {
        return $this->sum('cards.score');
    }
}
