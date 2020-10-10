<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TeamsResource;
use App\Models\Team;

class TeamsController extends Controller
{
    use ApiResponse;

    public function index(Request $request) {
        $query = (new Team)->newQuery();

        if ($request->has('order_field') && $request->has('order_direction')) {
            $order_field = $request->get('order_field');
            $order_direction = $request->get('order_direction');
            $query->orderBy($order_field, $order_direction);
        }
        if ($request->has('limit')) {
            $limit = $request->get('limit');
            $query->limit($limit);
        }
        $teams = $query->get();

        return $this->defaultResponse(TeamsResource::collection($teams));
    }

    public function show(Request $request, Team $team) {
        return $this->defaultResponse(new TeamsResource($team),'', 200);
    }

    public function store(Request $request) {
        $validator = $this->validations();
        if($validator->fails()){
            return $this->errorResponse($validator->messages(), 422);
        }
        $form = (object) $request->all();
        $team = new Team();
        $team->name = $form->name;
        $team->save();
        return $this->successResponse(new TeamsResource($team),'Time criado com sucesso', 201);
    }

    public function update(Request $request, Team $team) {
        $validator = $this->validations();
        if($validator->fails()){
            return $this->errorResponse($validator->messages(), 422);
        }
        $form = (object) $request->all();
        $team->name = $form->name;
        $team->save();
        return $this->successResponse(new TeamsResource($team),'Time ('.$team->id.') atualizado com sucesso', 200);
    }

    private function validations(){
        return Validator::make(request()->all(), [
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'O nome é obrigatório'
        ]);
    }
}
