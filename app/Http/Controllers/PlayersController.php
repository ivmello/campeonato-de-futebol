<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\PlayersResources;
use App\Models\Team;
use App\Models\Player;

class PlayersController extends Controller
{
    use ApiResponse;

    public function index(Request $request, Team $team) {
        $query = (new Player)->newQuery();

        if ($request->has('available') && $request->get('available') == 1) {
            $query->whereNull('team_id');
        }
        if ($request->has('available') && $request->get('available') == 0) {
            $query->whereNotNull('team_id');
        }
        if ($request->has('order_field') && $request->has('order_direction')) {
            $order_field = $request->get('order_field');
            $order_direction = $request->get('order_direction');
            $query->orderBy($order_field, $order_direction);
        }
        if ($request->has('limit')) {
            $limit = $request->get('limit');
            $query->limit($limit);
        }
        if ($team->id) {
            $query->where(['team_id' => $team->id]);
        }
        $players = $query->get();

        return $this->defaultResponse(PlayersResources::collection($players));
    }

    public function show(Request $request, Player $player) {
        return $this->defaultResponse(new PlayersResources($player),'', 200);
    }

    public function store(Request $request) {
        $validator = $this->validations('add');
        if($validator->fails()){
            return $this->errorResponse($validator->messages(), 422);
        }
        $form = (object) $request->all();
        $player = new Player();

        if (isset($form->team_id)) $player->team_id = $form->team_id;
        if (isset($form->name)) $player->name = $form->name;
        if (isset($form->cpf)) $player->cpf = $form->cpf;
        if (isset($form->tshirt_number)) $player->tshirt_number = $form->tshirt_number;
        $player->save();
        return $this->successResponse(new PlayersResources($player),'Jogador criado com sucesso', 201);
    }

    public function update(Request $request, Team $team, Player $player) {
        $form = (object) $request->all();
        $validator = $this->validations('update', $player);
        if($validator->fails()){
            return $this->errorResponse($validator->messages(), 422);
        }

        if (
            isset($form->team_id)
            && !empty($form->team_id)
            && !empty($player->team_id)
            && $form->team_id != $player->team_id
        ) {
            return $this->errorResponse([
                'team_id' => [
                    'Este jogador já foi escalado'
                ],
            ], 422);
        }

        $count_players = $team->countPlayers();

        if ($count_players >= 5) {
            return $this->errorResponse([
                'team_id' => [
                    'Esse time já está completo'
                ],
            ], 422);
        }

        if (isset($form->team_id) && !empty($form->team_id)) $player->team_id = $form->team_id;
        if (isset($form->name) && !empty($form->name)) $player->name = $form->name;
        if (isset($form->cpf) && !empty($form->cpf)) $player->cpf = $form->cpf;
        if (isset($form->tshirt_number)) $player->tshirt_number = $form->tshirt_number;

        $player->save();
        return $this->successResponse(new PlayersResources($player),'Jogador ('.$player->id.') atualizado com sucesso', 200);
    }

    private function validations($method = null, $player = null) {
        if ($method == 'add') {
            $obj_validate = [
                'name' => 'required|string|max:255',
                'tshirt_number' => 'required',
                'cpf' => [
                    'required',
                    'string',
                    'size:11',
                ],
            ];
        } else if($method == 'update') {
            $obj_validate = [
                'cpf' => [
                    'string',
                    'size:11',
                    Rule::unique('players')->ignore($player->id),
                ],
            ];
        }
        $obj_messages = [
            'name.required' => 'O nome é obrigatório',
            'tshirt_number.required' => 'O número da camisa é obrigatório',
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.unique' => 'Este CPF já existe no sistema',
            'cpf.size' => 'O CPF precisa ter 11 caracteres',
        ];

        return Validator::make(request()->all(), $obj_validate, $obj_messages);
    }
}
