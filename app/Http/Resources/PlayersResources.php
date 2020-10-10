<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayersResources extends JsonResource
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
            'team_id' => $this->team_id,
            'name' => $this->name,
            'cpf' => $this->cpf,
            'tshirt_number' => $this->tshirt_number,
        ];

        if ($this->team()->exists()) {
            $result['team'] = [
                'id'  => $this->team->id,
                'name'  => $this->team->name,
            ];
        }
        return $result;
    }
}
