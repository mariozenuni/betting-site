<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Outcome;

class OutcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Outcome::factory(1)->create([
            'name' => 'Won'     
         ]);
         Outcome::factory(1)->create([
            'name' => 'Lost'     
         ]);
         Outcome::factory(1)->create([
            'name' => 'Draw'     
         ]);
        
    }
}
