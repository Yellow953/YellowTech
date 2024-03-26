<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clients')->insert([
            'name' => 'test',
            'email' => 'test@test.com',
            'city' => 'city',
            'address' => 'address',
            'phone' => '70285659',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
