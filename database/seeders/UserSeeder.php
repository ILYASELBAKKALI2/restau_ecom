<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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

           [
            'name' => 'mourad GHAZI',
            'email' => 'mourad@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'active' => '1',
            'remember_token' => Str::random(10),
           ],

           [
            'name' => 'ilyas EL BAKKALI',
            'email' => 'ilyas@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'active' => '1',
            'remember_token' => Str::random(10),
           ],

           [
            'name' => 'user',
            'email' => 'user@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'active' => '1',
            'remember_token' => Str::random(10),
           ],

        ]);
    }
}
