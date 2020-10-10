<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\GamesResource;
use App\Models\Team;
use App\Models\Game;

class GamesController extends Controller
{
    use ApiResponse;

    public function index(Request $request) {
        $query = (new Game)->newQuery();

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

    public function store(Request $request) {
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
            'start_date' => 'required',
            'end_date' => 'required',
            'team_a_id' => 'required',
            'team_b_id' => 'required',
            'score_team_a' => 'required',
            'score_team_b' => 'required',
        ], [
            'start_date.required' => 'data inicial é obrigatória',
            'end_date.required' => 'data final é obrigatória',
            'team_a_id.required' => 'o id do time A é obrigatório',
            'team_b_id.required' => 'o id do time B é obrigatório',
            'score_team_a.required' => 'os gols do time A são obrigatórios',
            'score_team_b.required' => 'os gols do time B são obrigatórios',
        ]);
    }
}
