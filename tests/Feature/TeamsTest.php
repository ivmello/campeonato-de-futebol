<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Team;

class TeamsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/api/teams');
        $response->assertStatus(200);
    }
    public function testShow()
    {
        $team = Team::create(['name' => 'time de teste']);
        $response = $this->get('/api/teams/'.$team->id, [
            'name' => 'time de teste atualizado',
        ]);
        $response->assertStatus(200);
    }
    public function testCreate()
    {
        $response = $this->post('/api/teams', [
            'name' => 'nome do time',
        ]);
        $response->assertStatus(201);

        $response = $this->post('/api/teams', [
            'campo_errado' => 'nome do time',
        ]);
        $response->assertStatus(422);
    }
    public function testUpdate()
    {
        $team = Team::create(['name' => 'time de teste']);
        $response = $this->put('/api/teams/'.$team->id, [
            'name' => 'time de teste atualizado',
        ]);
        $response->assertStatus(200);
    }
}
