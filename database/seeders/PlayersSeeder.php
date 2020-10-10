<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Player::insert([
            [
                'name' => 'Igor Mello',
                'cpf' => '02206851181',
                'tshirt_number' => 10,
            ],
            [
                'name' => 'José da Silva',
                'cpf' => '02206851182',
                'tshirt_number' => 9,
            ],
            [
                'name' => 'João das Neves',
                'cpf' => '02206851183',
                'tshirt_number' => 12,
            ],
            [
                'name' => 'Pedro Pedreira',
                'cpf' => '02206851184',
                'tshirt_number' => 1,
            ],
            [
                'name' => 'Francisco França',
                'cpf' => '02206851185',
                'tshirt_number' => 2,
            ],
            [
                'name' => 'Moraes Moreira',
                'cpf' => '02206851186',
                'tshirt_number' => 6,
            ],
        ]);
    }
}
