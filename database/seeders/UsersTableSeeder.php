<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create and insert Admin user record
        User::create([
            'name' => 'Hassan Shahzad',
            'user_type' => 'admin',
            'email' => 'admin@example.com',
            'province_id'=>'1',
            'division_id' => '1',
            'password' => Hash::make('admin@123'),
        ]);
    }
}
