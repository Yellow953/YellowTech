<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test.com',
            'role' => 'admin',
            'phone' => '+4915204820649',
            'password' => Hash::make('qwe123'),
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'client',
            'email' => 'client@client.com',
            'role' => 'client',
            'phone' => '+4915204820649',
            'city' => 'Gronau',
            'address' => 'werkstrasse 2, 31028',
            'password' => Hash::make('qwe123'),
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'staff',
            'email' => 'staff@staff.com',
            'role' => 'staff',
            'phone' => '+4915204820649',
            'city' => 'Gronau',
            'address' => 'werkstrasse 2, 31028',
            'password' => Hash::make('qwe123'),
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
