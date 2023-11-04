<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Division;


class DivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Division::create(['name' => 'Lahore', 'province_id' => 1]);
        Division::create(['name' => 'Karachi', 'province_id' => 3]);
        // Add more divisions as needed
    }
}
