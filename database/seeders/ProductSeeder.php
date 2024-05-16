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
            'keywords' => 'Stockify, accounting system Lebanon, software lebanon, inventory management system',
            'image' => 'uploads/products/Banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Barcode Scanner',
            'category_id' => 2,
            'quantity' => 1000,
            'unit_cost' => 20,
            'unit_price' => 30,
            'compare_price' => 50,
            'condition' => 'new',
            'description' => 'Barcode Reader/Scanner, 2D/3D, USB/Wired/Wireless',
            'keywords' => 'Barcode Scanner, Barcode Scanner Lebanon, POS, 3D barcode',
            'image' => 'uploads/products/final-barcode-scanner.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Mouse Pen',
            'category_id' => 2,
            'quantity' => 1000,
            'unit_cost' => 10,
            'unit_price' => 20,
            'compare_price' => 25,
            'condition' => 'new',
            'description' => 'Ever wanted a precise tool to paint? Introducing the new digital mouse pen that allows you to perform very precise and easy mouse clicks...',
            'keywords' => 'mouse pen, mouse pen lebanon, mouse, painting, digital tool',
            'image' => 'uploads/products/pocket-mouse-pen.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
