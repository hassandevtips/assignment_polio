<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HouseholdMember;

class HouseholdMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         HouseholdMember::create([
            'household_id' => 1,
            'name' => 'John Doe',
            'age' => 35,
            'gender' => 'Male',
            'vaccination_status' => 'Vaccinated'
        ]);

        HouseholdMember::create([
            'household_id' => 2,
            'name' => 'Jane Smith',
            'age' => 28,
            'gender' => 'Female',
            'vaccination_status' => 'Not Vaccinated'
        ]);
        // Add more household members as needed
    }
}
