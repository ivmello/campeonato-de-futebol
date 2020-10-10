<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\GamesResource;
use App\Models\Card;
use App\Models\Game;

class CardsController extends Controller
{
    use ApiResponse;

    public function index(Request $request, Game $game) {
        $query = (new Card)->newQuery();

        if ($request->has('order_field') && $request->has('order_direction')) {
            $order_field = $request->get('order_field');
            $order_direction = $request->get('order_direction');
            $query->orderBy($order_field, $order_direction);
        }
        if ($request->has('limit')) {
            $limit = $request->get('limit');
            $query->limit($limit);
        }
        $games = $query->get();

        return $this->defaultResponse(GamesResource::collection($games));
    }

    public function show(Request $request, Game $game) {
        return $this->defaultResponse(new GamesResource($game),'', 200);
    }

    public function store(Request $request, Game $game) {
        $validator = $this->validations();
        if($validator->fails()){
            return $this->errorResponse($validator->messages(), 422);
        }
        $form = (object) $request->all();
        $game = new Game();

        if (isset($form->team_a_id)) $game->team_a_id = $form->team_a_id;
        if (isset($form->team_b_id)) $game->team_b_id = $form->team_b_id;
        if (isset($form->start_date)) $game->start_date = $form->start_date;
        if (isset($form->end_date)) $game->end_date = $form->end_date;
        if (isset($form->score_team_a)) $game->score_team_a = $form->score_team_a;
        if (isset($form->score_team_b)) $game->score_team_b = $form->score_team_b;
        $game->tie = false;

        if ($game->score_team_a == $game->score_team_b) {
            $game->tie = true;
        }

        if ($game->team_a_id == $game->team_b_id) {
            return $this->errorResponse([
                'team_id' => [
                    'Selecione dois times distintos entre sí',
                ],
            ], 422);
        }

        $game->save();

        return $this->successResponse(new GamesResource($game),'Partida criada com sucesso', 201);
    }

    public function update(Request $request, Game $game) {
        $validator = $this->validations();

        if($validator->fails()){
            return $this->errorResponse($validator->messages(), 422);
        }
        $form = (object) $request->all();

        if (isset($form->start_date)) $game->start_date = $form->start_date;
        if (isset($form->end_date)) $game->end_date = $form->end_date;
        if (isset($form->score_team_a)) $game->score_team_a = $form->score_team_a;
        if (isset($form->score_team_b)) $game->score_team_b = $form->score_team_b;
        $game->tie = false;

        if ($form->score_team_a == $form->score_team_b) {
            $game->tie = true;
        }

        if ($form->team_a_id == $form->team_b_id) {
            return $this->errorResponse([
                'teams' => [
                    'Selecione dois times distintos entre sí',
                ],
            ], 422);
        }


        $game->save();
        return $this->successResponse(new GamesResource($game),'Partida ('.$game->id.') atualizada com sucesso', 200);
    }

    private function validations() {
        return Validator::make(request()->all(), [
            'game_id' => 'required',
            'player_id' => 'required',
        ], [
            'game_id.required' => 'o jogo é obrigatório',
            'player_id.required' => 'o jogador é obrigatório',
            'red_card.required' => 'os cartões amarelos sao obrigatórios (caso não tenha tido nenhum, adicionar 0)',
            'yellow_card.required' => 'os cartões amarelos sao obrigatórios (caso não tenha tido nenhum, adicionar 0)',
        ]);
    }
}
