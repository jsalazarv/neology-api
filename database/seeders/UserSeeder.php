<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin = User::create([
            'name' => 'Jacob',
            'last_name' => 'Davis',
            'username' => 'jdavis',
            'email' => 'jacob_davis@neology.net',
            'password' => Hash::make('secret'),
            'role' => 'admin',
            'status' => 'active',
        ]);

       $picture = new Document([
           'file_name' => Storage::path('assets/avatar.jpeg'),
           'extension' => 'jpeg',
           'type' => 'picture'
       ]);

       $admin->picture()->save($picture);



       $employee = User::create([
           'name' => 'Luke',
           'last_name' => 'Kollman',
           'username' => 'lkollman',
           'email' => 'luke_kollman@neology.net',
           'password' => Hash::make('secret'),
           'role' => 'employee',
           'status' => 'active',
       ]);

        $picture = new Document([
            'file_name' => Storage::path('assets/avatar.jpeg'),
            'extension' => 'jpeg',
            'type' => 'picture'
        ]);

        $employee->picture()->save($picture);

    }
}
