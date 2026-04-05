<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Platform;
use App\Models\Publisher;
use Faker\Factory as Faker;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $titles = [
            'Eriksholm: The Stolen Dream',
            'Split Fiction',
            'Ninja Gaiden 4',
            'Helldivers 2',
            'Call of Duty: Black Ops 7',
            'Resident Evil Requiem',
            'Crimson Desert',
            'Tales of Berseria Remastered',
            'Towerborne',
        ];

        $genreIds = Genre::pluck('id')->toArray();
        $platformIds = Platform::pluck('id')->toArray();
        $publisherIds = Publisher::pluck('id')->toArray();

         foreach ($titles as $title) {
            Game::create([
                'title' => $title,
                'platform_id' => $platformIds[array_rand($platformIds)],
                'genre_id' => $genreIds[array_rand($genreIds)],
                'publisher_id' => $publisherIds[array_rand($publisherIds)],
                'is_physical' => (bool) random_int(0, 1),
                'is_digital' => (bool) random_int(0, 1),
                'release' => random_int(2024, 2026),
            ]);
        }
    }
}
