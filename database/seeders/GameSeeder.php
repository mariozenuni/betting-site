<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $game = Game::factory(1)->create([
            'name' => 'European',
            'starting_date' => '2023-04-19',
            'starting_time' => '19:16:00',
            'bettable' => 1,
            'ended' => 0          
         ]);
        
    }

}
