<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create three users with specific name, email, and password
        $users = [
            [
                'name' => 'Saroar Hossain',
                'email' => 'limonhossain57@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
                'phone' => '01742560972',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Employee User',
                'email' => 'employee@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'employee',
                'phone' => '01742560973',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Employer User',
                'email' => 'employer@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'employer',
                'phone' => '01742560974',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ];


        // Insert the users into the database
        User::insert($users);
    }
}
