<?php

namespace Database\Seeders;

use App\Models\Bed;
use App\Models\Order;
use App\Models\Patient;
use App\Models\Sector;
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
        Bed::factory(10)->create();
        Patient::factory(10)->create();
        User::factory(10)->create();
        Order::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
