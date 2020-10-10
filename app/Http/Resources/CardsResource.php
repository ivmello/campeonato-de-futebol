<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CardsResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $result = [
            'id' => $this->id,
            'game_id' => $this->game_id,
            'player_id' => $this->player_id,
            'red_card' => $this->red_card,
            'yellow_card' => $this->yellow_card,
            'score' => $this->score,
        ];

        return $result;
    }
}
