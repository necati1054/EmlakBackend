<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Ilan::factory()->count(24)->create();

        $data = [
            [
                'user_id' => 2,
                'ilanable_id' => 1,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'ilanable_id' => 1,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'ilanable_id' => 1,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 3,
                'ilanable_id' => 2,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 3,
                'ilanable_id' => 2,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 3,
                'ilanable_id' => 2,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 4,
                'ilanable_id' => 3,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 4,
                'ilanable_id' => 3,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 4,
                'ilanable_id' => 3,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 5,
                'ilanable_id' => 4,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 5,
                'ilanable_id' => 4,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 5,
                'ilanable_id' => 4,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 6,
                'ilanable_id' => 5,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 6,
                'ilanable_id' => 5,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 6,
                'ilanable_id' => 5,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 7,
                'ilanable_id' => 6,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 7,
                'ilanable_id' => 6,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 7,
                'ilanable_id' => 6,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 8,
                'ilanable_id' => 7,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 8,
                'ilanable_id' => 7,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 8,
                'ilanable_id' => 7,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 9,
                'ilanable_id' => 8,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 9,
                'ilanable_id' => 8,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 9,
                'ilanable_id' => 8,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 10,
                'ilanable_id' => 9,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 10,
                'ilanable_id' => 9,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 10,
                'ilanable_id' => 9,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 11,
                'ilanable_id' => 10,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 11,
                'ilanable_id' => 10,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 11,
                'ilanable_id' => 10,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 12,
                'ilanable_id' => 11,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 12,
                'ilanable_id' => 11,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 12,
                'ilanable_id' => 11,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 13,
                'ilanable_id' => 12,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 13,
                'ilanable_id' => 12,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 13,
                'ilanable_id' => 12,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 14,
                'ilanable_id' => 13,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 14,
                'ilanable_id' => 13,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 14,
                'ilanable_id' => 13,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 15,
                'ilanable_id' => 14,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 15,
                'ilanable_id' => 14,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 15,
                'ilanable_id' => 14,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 16,
                'ilanable_id' => 15,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 16,
                'ilanable_id' => 15,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 16,
                'ilanable_id' => 15,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 17,
                'ilanable_id' => 16,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 17,
                'ilanable_id' => 16,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 17,
                'ilanable_id' => 16,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 18,
                'ilanable_id' => 17,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 18,
                'ilanable_id' => 17,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 18,
                'ilanable_id' => 17,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 19,
                'ilanable_id' => 18,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 19,
                'ilanable_id' => 18,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 19,
                'ilanable_id' => 18,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 20,
                'ilanable_id' => 19,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 20,
                'ilanable_id' => 19,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 20,
                'ilanable_id' => 19,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 21,
                'ilanable_id' => 20,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 21,
                'ilanable_id' => 20,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 21,
                'ilanable_id' => 20,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 22,
                'ilanable_id' => 21,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 22,
                'ilanable_id' => 21,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 22,
                'ilanable_id' => 21,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 23,
                'ilanable_id' => 22,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 23,
                'ilanable_id' => 22,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 23,
                'ilanable_id' => 22,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 24,
                'ilanable_id' => 23,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 24,
                'ilanable_id' => 23,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 24,
                'ilanable_id' => 23,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
            [
                'user_id' => 25,
                'ilanable_id' => 24,
                'ilanable_type' => 'App\Models\IsYeri',
                'created_at' => now(),
            ],
            [
                'user_id' => 25,
                'ilanable_id' => 24,
                'ilanable_type' => 'App\Models\Konut',
                'created_at' => now(),
            ],
            [
                'user_id' => 25,
                'ilanable_id' => 24,
                'ilanable_type' => 'App\Models\Arsa',
                'created_at' => now(),
            ],
        ];

        DB::table('ilans')->insert($data);
    }
}
