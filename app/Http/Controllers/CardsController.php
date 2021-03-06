<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CardsResource;
use App\Models\Card;
use App\Models\Game;
use App\Models\Player;

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

        return $this->defaultResponse(CardsResource::collection($games));
    }

    public function show(Request $request, Game $game) {
        return $this->defaultResponse(new CardsResource($game),'', 200);
    }

    public function store(Request $request, Game $game) {
        $validator = $this->validations();
        if($validator->fails()){
            return $this->errorResponse($validator->messages(), 422);
        }
        $form = (object) $request->all();
        $score = 0;
        $red_card_score = 0;
        $yellow_card_score = 0;

        if (isset($form->red_card) && $form->red_card > 0) {
            $red_card_score = 2 * $form->red_card;
        }

        if (isset($form->yellow_card) && $form->yellow_card > 0) {
            $yellow_card_score = $form->yellow_card;
        }

        $score = $red_card_score + $yellow_card_score;

        $card = $game->cards()->create([
            'player_id' => $form->player_id,
            'red_card' => $form->red_card,
            'yellow_card' => $form->yellow_card,
            'score' => $score,
        ]);

        $card->player->team()->update([
            'score_cards' => $card->player->team->score_cards + $score
        ]);

        $card->player()->update([
            'score' => $card->player->score + $score
        ]);

        return $this->successResponse(new CardsResource($card),'Cart??o criado com sucesso', 201);
    }

    public function update(Request $request, Game $game, Card $card) {
        $validator = $this->validations();
        if($validator->fails()){
            return $this->errorResponse($validator->messages(), 422);
        }
        $form = (object) $request->all();

        $score = 0;
        $red_card_score = 0;
        $yellow_card_score = 0;

        if (isset($form->red_card) && $form->red_card > 0) {
            $red_card_score = 2 * $form->red_card;
        }

        if (isset($form->yellow_card) && $form->yellow_card > 0) {
            $yellow_card_score = $form->yellow_card;
        }

        $score = $red_card_score + $yellow_card_score;

        if (isset($form->red_card)) $card->red_card = $form->red_card;
        if (isset($form->yellow_card)) $card->yellow_card = $form->yellow_card;
        $card->score = $score;
        $card->save();

        $score_total = Card::where([
            'player_id' => $card->player->id,
        ])->sum('score');

        $card->player->team()->update([
            'score_cards' => $score_total
        ]);

        $card->player()->update([
            'score' => $score_total
        ]);

        return $this->successResponse(new CardsResource($card),'Cart??es ('.$card->id.') atualizados com sucesso', 200);
    }

    private function validations() {
        return Validator::make(request()->all(), [
            'player_id' => 'required',
        ], [
            'game_id.required' => 'o jogo ?? obrigat??rio',
            'player_id.required' => 'o jogador ?? obrigat??rio',
            'red_card.required' => 'os cart??es amarelos sao obrigat??rios (caso n??o tenha tido nenhum, adicionar 0)',
            'yellow_card.required' => 'os cart??es amarelos sao obrigat??rios (caso n??o tenha tido nenhum, adicionar 0)',
        ]);
    }
}
