<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('promos')->insert([
            'name' => 'disc10',
            'value' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
