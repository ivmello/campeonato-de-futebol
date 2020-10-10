<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\RankingsResource;
use App\Models\Game;
use App\Models\Team;
use App\Models\Player;

class RankingsController extends Controller
{
    use ApiResponse;

    public function index(Request $request, Team $team) {
        $query = (new Team)->newQuery();

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

        $query->orderBy('score_games', 'DESC')->orderBy('score_cards', 'ASC')->with(array('players' => function($query) {
            // $query->with('cards')->orderBy('cards.score', 'DESC');
        }));
        $teams = $query->get();

        return $this->defaultResponse(RankingsResource::collection($teams));
    }
}
