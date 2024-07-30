<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Fernando Rolón',
            'email' => 'fhernatural@gmail.com',
            'password' => bcrypt('Luis1234'),
        ])->assignRole('SuperAdmin');

        User::factory(9)->create();
    }
}
