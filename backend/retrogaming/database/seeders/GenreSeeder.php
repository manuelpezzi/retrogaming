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
            ['name'=>'action','color'=>'#FF0000'],
            ['name'=>'stealth','color'=>'#4B0082'],
            ['name'=>'RPG','color'=>'#008000'],
            ['name'=>'JRPG','color'=>'#00CED1'],
            ['name'=>'Adventure','color'=>'#FFA500'],
            ['name'=>'Puzzle','color'=>'#FFFF00'],
        ];
        foreach ($genres as $genre) {
            Genre::updateOrCreate(
                ['name'=> $genre['name']],
                ['color'=> $genre['color']]
            );
        }
    }
}
