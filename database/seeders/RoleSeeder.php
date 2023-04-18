<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
    Role::factory(1)->create([
        'role' => 'standard'     
     ]);
     Role::factory(1)->create([
        'role' => 'admin'     
     ]);
    }
}
