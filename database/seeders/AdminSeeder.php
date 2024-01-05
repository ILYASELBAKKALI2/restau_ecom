<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([

                'name' => 'admin',
                'email' => 'admin@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'), // password
                'remember_token' => Str::random(10),
        ]);
    }
}
