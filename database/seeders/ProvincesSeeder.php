<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Province::create(['name' => 'Punjab']);
        Province::create(['name' => 'KPK']);
        Province::create(['name' => 'Sindh']);
        // Add more provinces as needed
    }
}
