<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Player;
use App\Models\Game;
use App\Models\Card;

class CardTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $game = Game::create([
            "start_date" => "2020-01-20 10:10:00",
            "end_date" => "2020-01-20 11:50:00",
            "team_a_id" => 2,
            "team_b_id" => 1,
            "score_team_a" => 1,
            "score_team_b" => 1,
        ]);
        $response = $this->get('/api/games/'.$game->id.'/cards');
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $game = Game::create([
            "start_date" => "2020-01-20 10:10:00",
            "end_date" => "2020-01-20 11:50:00",
            "team_a_id" => 2,
            "team_b_id" => 1,
            "score_team_a" => 1,
            "score_team_b" => 1,
        ]);
        $player = Player::create([
            'name' => 'player teste',
            'cpf' => strval(rand(10000000000,99999999999)),
            'tshirt_number' => 1,
        ]);

        $response = $this->post('/api/games/'.$game->id.'/cards', [
            "player_id" => $player->id,
            "red_card" => 0,
            "yellow_card" => 1,

        ]);
        $response->assertStatus(201);
    }

    public function testUpdate()
    {
        $game = Game::create([
            "start_date" => "2020-01-20 10:10:00",
            "end_date" => "2020-01-20 11:50:00",
            "team_a_id" => 2,
            "team_b_id" => 1,
            "score_team_a" => 1,
            "score_team_b" => 1,
        ]);
        $player = Player::create([
            'name' => 'player teste',
            'cpf' => strval(rand(10000000000,99999999999)),
            'tshirt_number' => 1,
        ]);
        $card = Card::create([
            'game_id' => $game->id,
            'player_id' => $player->id,
            'red_card' => 0,
            'yellow_card' => 0,
        ]);

        $response = $this->put('/api/games/'.$game->id.'/cards/'.$card->id, [
            "player_id" => $player->id,
            "red_card" => 0,
            "yellow_card" => 2,
        ]);
        $response->assertStatus(200);
        // $response->assertJson([
        //     "id" => $card->id,
        //     "game_id" => $game->id,
        //     "player_id" => $player->id,
        //     "red_card" => 0,
        //     "yellow_card" => 2,
        //     'score' => 2,
        // ]);
    }
}
