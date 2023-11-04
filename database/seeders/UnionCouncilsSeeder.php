<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UnionCouncil;

class UnionCouncilsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnionCouncil::create(['name' => 'Union Council X', 'tehsil_id' => 1]);
        UnionCouncil::create(['name' => 'Union Council Y', 'tehsil_id' => 2]);
        // Add more union councils as needed
    }
}
