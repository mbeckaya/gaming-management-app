<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Platform;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = [
            'XSX',
            'XSS',
            'XONE',
            'X360',
            'XBOX',
            'PSX',
            'PS2',
            'PS3',
            'PS4',
            'PS5',
            'PC',
        ];

        foreach($platforms as $platform) {
             Platform::create([
                'name' => $platform,
            ]);
        }
    }
}
