<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScreeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('screenings')->insert([
            [
                'movie_id' => 1,
                'date' => '2024-10-15 16:30:00',
                'vacant_seats' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'movie_id' => 1,
                'date' => '2024-10-22 10:00:00',
                'vacant_seats' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'movie_id' => 3,
                'date' => '2024-10-20 20:40:00',
                'vacant_seats' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
