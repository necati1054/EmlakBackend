<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'admin',
                'surname' => 'admin',
                'phone_number' => '1234567890',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('Password1'),
                'role' => 0,
                'is_active' => 1,
                'created_at' => now(),
            ],
        ];

        DB::table('users')->insert($data);

        \App\Models\User::factory()->count(24)->create();
    }
}
