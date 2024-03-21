<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'YellowPOS',
            'category_id' => 1,
            'quantity' => 1000,
            'unit_cost' => 0,
            'unit_price' => 200,
            'compare_price' => 250,
            'condition' => 'new',
            'description' => 'YellowPOS is the all in 1 tool to run your sales business...',
            'keywords' => 'YellowPOS, POS Lebanon, software lebanon',
            'image' => 'uploads/products/Banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Stockify',
            'category_id' => 1,
            'quantity' => 1000,
            'unit_cost' => 0,
            'unit_price' => 1000,
            'compare_price' => 1500,
            'condition' => 'new',
            'description' => 'Stockify is a cloud based inventory management software, accounting system, invoicing system with digital signature and excell integrations and more...',
            'keywords' => 'Stockigy, accounting system Lebanon, software lebanon, inventory management system',
            'image' => 'uploads/products/Banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'laptop 1',
            'category_id' => 2,
            'quantity' => 1,
            'unit_cost' => 150,
            'unit_price' => 200,
            'compare_price' => 250,
            'condition' => 'used',
            'description' => 'Lenovo thinkpad x1 RAM: 8GB HDD: 500GB CPU: i5 gen 4',
            'keywords' => 'thinkpad x1 lebanon, lenovo, laptop, computer',
            'image' => 'https://wallpapers.com/images/featured/4k-laptop-yn553k4gdhpc4hlh.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'laptop 2',
            'category_id' => 2,
            'quantity' => 1,
            'unit_cost' => 450,
            'unit_price' => 800,
            'compare_price' => 1000,
            'condition' => 'new',
            'description' => 'Lenovo thinkpad t260 RAM: 16GB SSD: 500GB CPU: i7 gen 6',
            'keywords' => 'thinkpad t260 lebanon, lenovo, laptop, computer',
            'image' => 'https://wallpapers.com/images/featured/4k-laptop-yn553k4gdhpc4hlh.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
