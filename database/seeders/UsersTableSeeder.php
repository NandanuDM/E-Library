<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Roni Hamid',
                'email' => 'roni@example.com',
                'password' => Hash::make('password123'),
                'role' => 'librarian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aishah Putri Pertiwi',
                'email' => 'aish.putri@example.com',
                'password' => Hash::make('password123'),
                'role' => 'librarian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Novi Fitriyani',
                'email' => 'novi@example.com',
                'password' => Hash::make('password123'),
                'role' => 'librarian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}