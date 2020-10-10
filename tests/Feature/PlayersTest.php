<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
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
        Player::truncate();
        $response = $this->post('/api/players', [
            'name' => 'Igor Vieira de Mello',
            'cpf' => '02206851181',
            'tshirt_number' => 10,
        ]);
        $response->assertStatus(201);
    }
    public function testUpdate()
    {
        Player::truncate();
        Player::create([
            'name' => 'player teste',
            'cpf' => '12233344456',
            'tshirt_number' => 1,
        ]);
        $response = $this->put('/api/players/1', [
            'name' => 'Igor Vieira de Mello',
            'cpf' => '02206851181',
            'tshirt_number' => 10,
        ]);
        $response->assertStatus(200);
    }
}
