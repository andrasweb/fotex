<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'title' => 'Csillagok között',
                'description' => 'When Earth becomes uninhabitable in the future, a farmer and ex-NASA pilot, Joseph Cooper, is tasked to pilot a spacecraft, along with a team of researchers, to find a new planet for humans.',
                'age' => 12,
                'language' => 'hu',
                'image' => 'img/1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Ponyvaregény',
                'description' => 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.',
                'age' => 18,
                'language' => 'hu',
                'image' => 'img/2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Harcosok klubja',
                'description' => 'An insomniac office worker and a devil-may-care soap maker form an underground fight club that evolves into much more.',
                'age' => 18,
                'language' => 'hu',
                'image' => 'img/3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
