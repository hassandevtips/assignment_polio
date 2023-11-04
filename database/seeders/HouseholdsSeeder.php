<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Household;

class HouseholdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Household::create(['union_council_id' => 1, 'address' => '123 Main St']);
        Household::create(['union_council_id' => 2, 'address' => '456 Elm St']);
        // Add more households as needed
    }
}
