<?php

namespace Database\Seeders;

use App\Models\Videogame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideogameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videogames = [
            [
                'titolo' => 'Metal Gear Solid',
                'anno' => 1998,
                'description' => 'Un gioco stealth iconico diretto da Hideo Kojima.',
                'producer_id' => 1, // Konami
                'copertina' => '',
                'genres' => [1, 2], // Action, Stealth
            ],
            [
                'titolo' => 'The Legend of Zelda: Ocarina of Time',
                'anno' => 1998,
                'description' => 'Un capolavoro di avventura di Nintendo.',
                'producer_id' => 2, // Nintendo
                'copertina' => '',
                'genres' => [4], // Adventure
            ],
            [
                'titolo' => 'Final Fantasy VII',
                'anno' => 1997,
                'description' => 'Un JRPG leggendario con una trama epica.',
                'producer_id' => 3, // Square Enix
                'copertina' => '',
                'genres' => [3, 6], // RPG, JRPG
            ],
            [
                'titolo' => 'Super Mario 64',
                'anno' => 1996,
                'description' => 'Un platform rivoluzionario per Nintendo 64.',
                'producer_id' => 2, // Nintendo
                'copertina' => '',
                'genres' => [4], // Adventure
            ],
            [
                'titolo' => 'Resident Evil 2',
                'anno' => 1998,
                'description' => 'Un survival horror classico ambientato a Raccoon City.',
                'producer_id' => 4, // Capcom
                'copertina' => '',
                'genres' => [1], // Action
            ],
            [
                'titolo' => 'Chrono Trigger',
                'anno' => 1995,
                'description' => 'Un JRPG con viaggi nel tempo e una storia epica.',
                'producer_id' => 3, // Square Enix
                'copertina' => '',
                'genres' => [3, 6], // RPG, JRPG
            ],
            [
                'titolo' => 'Crash Bandicoot',
                'anno' => 1996,
                'description' => 'Un platform iconico per PlayStation.',
                'producer_id' => 5, // Sony
                'copertina' => '',
                'genres' => [1, 4], // Action, Adventure
            ],
            [
                'titolo' => 'Silent Hill',
                'anno' => 1999,
                'description' => 'Un survival horror psicologico di grande impatto.',
                'producer_id' => 1, // Konami
                'copertina' => '',
                'genres' => [1], // Action
            ],
            [
                'titolo' => 'Street Fighter II',
                'anno' => 1991,
                'description' => 'Un gioco di combattimento che ha definito il genere.',
                'producer_id' => 4, // Capcom
                'copertina' => '',
                'genres' => [1], // Action
            ],
            [
                'titolo' => 'Tetris',
                'anno' => 1989,
                'description' => 'Un classico puzzle game distribuito da Nintendo.',
                'producer_id' => 2, // Nintendo
                'copertina' => '',
                'genres' => [5], // Puzzle
            ],
        ];
                foreach ($videogames as $data) {
            $genres = $data['genres'];
            unset($data['genres']); // Rimuovi 'genres' dai dati per Videogame
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $videogame = Videogame::create($data);
            $videogame->genres()->attach($genres); // Collega i generi tramite la tabella pivot
        }

    }
}
