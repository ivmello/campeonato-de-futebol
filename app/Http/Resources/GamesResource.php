<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GamesResource extends JsonResource
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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'team_a_id' => $this->team_a_id,
            'team_b_id' => $this->team_b_id,
            'score_team_a' => $this->score_team_a,
            'score_team_b' => $this->score_team_b,
            'tie' => $this->tie,
        ];

        return $result;
    }
}
