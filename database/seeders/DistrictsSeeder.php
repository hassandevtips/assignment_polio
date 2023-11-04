<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;


class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        District::create(['name' => 'Lahore City', 'division_id' => 1]);
        District::create(['name' => 'Karachi East', 'division_id' => 2]);
        // Add more districts as needed
    }
}
