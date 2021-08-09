<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'first_name' => 'Super Admin',
            'last_name' => '',
            'email' => 'superadmin@wilp.com',
            'occupation' => 'Developer',
            'country' => 'Nepal',
            'state' => 'Bagmati',
            'city' => 'Nepal',
            'role' => 'superadmin',
            'status' => 'active',
            'password' => Hash::make('password'),
        ]);
    }
}
