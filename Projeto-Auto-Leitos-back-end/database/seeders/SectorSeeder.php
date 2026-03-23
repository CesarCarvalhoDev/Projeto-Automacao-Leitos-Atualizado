<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectors = [
        'Nursing',
        'Cleaning',
        'Nutrition',
        'Emergency'
    ];

    foreach ($sectors as $sector) {
        Sector::create(['name' => $sector]);
    }
    }
}
