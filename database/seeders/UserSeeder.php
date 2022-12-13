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
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jacob',
            'last_name' => 'Davis',
            'username' => 'jdavis',
            'email' => 'jacob_davis@neology.net',
            'password' => Hash::make('secret'),
            'role' => 'admin',
            'status' => 'active',
        ]);

        DB::table('users')->insert([
            'name' => 'Luke',
            'last_name' => 'Kollman',
            'username' => 'lkollman',
            'email' => 'luke_kollman@neology.net',
            'password' => Hash::make('secret'),
            'role' => 'employee',
            'status' => 'active',
        ]);
    }
}
