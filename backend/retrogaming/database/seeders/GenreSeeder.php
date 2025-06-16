<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres=[
            ['name'=>'action'],
            ['name'=>'stealth'],
            ['name'=>'RPG'],
            ['name'=>'JRPG'],
            ['name'=>'Adventure'],
            ['name'=>'Puzzle'],
        ];
        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}
