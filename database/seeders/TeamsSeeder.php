<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::insert([
            [
                'name' => 'Amigos do Front-end',
            ],
            [
                'name' => 'Amigos do Back-end',
            ],
        ]);
    }
}
