<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'user1',
                'email' => 'user@test.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'user2',
                'email' => 'user2@test.com',
                'password' => Hash::make('password123')
            ],
        ]);
    }
}
