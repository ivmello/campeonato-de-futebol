<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RankingsResource extends JsonResource
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
            'name' => $this->name,
            'score_games' => $this->score_games,
            'score_cards' => $this->score_cards,
        ];

        if ($this->players()->exists()) {
            $players = $this->players()->get();
            $result['players'] = $players;
        }

        return $result;
    }
}
