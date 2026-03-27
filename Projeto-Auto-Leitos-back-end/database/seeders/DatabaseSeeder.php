<?php

namespace Database\Seeders;

use App\Models\Bed;
use App\Models\Order;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SectorSeeder::class);

        Bed::factory()->count(10)->available()->create();

        $occupiedBeds = Bed::factory()->count(5)->occupied()->create();

        foreach ($occupiedBeds as $bed) {
            Patient::factory()->create([
                'bed_id' => $bed->id
            ]);
        }

        Bed::factory()->count(3)->maintenance()->create();

        Patient::factory(5)->create([
            'bed_id' => null
        ]);

        User::factory(10)->create();
        Order::factory(10)->create();
    }
}
