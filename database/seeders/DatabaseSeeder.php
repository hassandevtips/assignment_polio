<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $seeders = [
        ProvincesSeeder::class,
        DivisionsSeeder::class,
        DistrictsSeeder::class,
        TehsilsSeeder::class,
        UnionCouncilsSeeder::class,
        HouseholdsSeeder::class,
        HouseholdMembersSeeder::class,
    ];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->seeders as $seeder) {
            $this->call($seeder);
        }
    }
}
