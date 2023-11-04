<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tehsil;


class TehsilsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tehsil::create(['name' => 'Tehsil A', 'district_id' => 1]);
        Tehsil::create(['name' => 'Tehsil B', 'district_id' => 2]);
        // Add more tehsils as needed
    }
}
