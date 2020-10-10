<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Game;

class GameTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/api/games');
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this->post('/api/games', [
            "start_date" => "2020-01-20 10:10:00",
            "end_date" => "2020-01-20 11:50:00",
            "team_a_id" => 2,
            "team_b_id" => 1,
            "score_team_a" => 2,
            "score_team_b" => 1,
        ]);
        $response->assertStatus(201);

        $response = $this->post('/api/games', [
            'campo_errado' => 'nome do time',
        ]);
        $response->assertStatus(422);
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
        $response = $this->put('/api/games/'.$game->id, [
            "start_date" => "2020-01-20 10:10:00",
            "end_date" => "2020-01-20 11:50:00",
            "team_a_id" => 2,
            "team_b_id" => 1,
            "score_team_a" => 7,
            "score_team_b" => 1,
        ]);
        $response->assertStatus(200);

        $response = $this->put('/api/games/'.$game->id, [
            "team_a_id" => 1,
            "team_b_id" => 1,
            "score_team_a" => 3,
            "score_team_b" => 1,
        ]);
        $response->assertStatus(422);
    }
}
