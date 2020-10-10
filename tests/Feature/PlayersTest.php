<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Team;
use App\Models\Player;

class PlayersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/api/players');
        $response->assertStatus(200);
    }
    public function testStore()
    {
        $response = $this->post('/api/players', [
            'name' => 'Igor Vieira de Mello',
            'cpf' => strval(rand(10000000000,99999999999)),
            'tshirt_number' => 10,
        ]);
        $response->assertStatus(201);
    }
    public function testUpdate()
    {
        $player = Player::create([
            'name' => 'player teste',
            'cpf' => strval(rand(10000000000,99999999999)),
            'tshirt_number' => 1,
        ]);
        $response = $this->put('/api/players/'.$player->id, [
            'name' => 'Igor Vieira de Mello',
            'cpf' => strval(rand(10000000000,99999999999)),
            'tshirt_number' => 10,
        ]);
        $response->assertStatus(200);
    }

    public function testUpdateTeam()
    {
        $player = Player::create([
            'name' => 'player teste',
            'cpf' => strval(rand(10000000000,99999999999)),
            'tshirt_number' => 1,
        ]);

        $team = Team::create(['name' => 'time de teste']);
        $response = $this->put('/api/players/'.$player->id, [
            'team_id' => $team->id,
        ]);
        $response->assertStatus(200);
    }
}
