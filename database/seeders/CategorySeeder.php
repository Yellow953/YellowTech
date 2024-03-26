<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'Software',
            'description' => 'This is a software category',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Hardware',
            'description' => 'This is a hardware category',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
