<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PlayersResources;
use App\Models\Player;

class PlayersController extends Controller
{
    use ApiResponse;

    /**
     * /players
     * query params:
     *  order_field
     *  order_direction (asc|desc)
     *  limit
     */
    public function index(Request $request) {
        $query = (new Player)->newQuery();

        if ($request->has('order_field') && $request->has('order_direction')) {
            $order_field = $request->get('order_field');
            $order_direction = $request->get('order_direction');
            $query->orderBy($order_field, $order_direction);
        }
        if ($request->has('limit')) {
            $limit = $request->get('limit');
            $query->limit($limit);
        }
        $players = $query->get();

        return $this->defaultResponse(PlayersResources::collection($players));
    }

    public function show(Request $request, Player $player) {
        return $this->defaultResponse($player,'', 200);
    }

    public function store(Request $request) {
        $validator = $this->validations();
        if($validator->fails()){
            return $this->errorResponse($validator->messages(), 422);
        }
        $form = (object) $request->all();
        $player = new Player();
        if (isset($form->team_id)) {
            $player->team_id = $form->team_id;
        }
        $player->name = $form->name;
        $player->cpf = $form->cpf;
        $player->tshirt_number = $form->tshirt_number;
        $player->save();
        return $this->successResponse($player,'Jogador criado com sucesso', 201);
    }

    public function update(Request $request, Player $player) {
        $validator = $this->validations();
        if($validator->fails()){
            return $this->errorResponse($validator->messages(), 422);
        }
        $form = (object) $request->all();
        $player->name = $form->name;
        $player->cpf = $form->cpf;
        $player->tshirt_number = $form->tshirt_number;
        $player->save();
        return $this->successResponse($player,'Jogador ('.$player->id.') atualizado com sucesso', 200);
    }

    public function validations(){
        return Validator::make(request()->all(), [
            'name' => 'required|string|max:255',
            'cpf' => 'required|unique:players|string|max:11',
        ], [
            'name.required' => 'O nome é obrigatório',
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.unique' => 'Este CPF já existe no sistema',
            'cpf.max' => 'O CPF não pode ter mais que 11 caracteres',
        ]);
    }
}
