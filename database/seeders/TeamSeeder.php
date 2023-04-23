<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::factory(1)->create([
            'name' => 'Italy'     
         ]);
         Team::factory(1)->create([
            'name' => 'Germany'     
         ]);
         Team::factory(1)->create([
            'name' => 'France'     
         ]);
         Team::factory(1)->create([
            'name' => 'Poland'     
         ]);
}
 }

