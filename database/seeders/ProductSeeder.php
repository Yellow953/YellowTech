<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'YellowPOS',
                'category_id' => 1,
                'quantity' => 1000,
                'unit_cost' => 0,
                'unit_price' => 200,
                'compare_price' => 250,
                'condition' => 'new',
                'description' => 'YellowPOS is the all in 1 tool to run your sales business...',
                'keywords' => 'YellowPOS, POS Lebanon, software lebanon',
                'image' => 'uploads/products/YellowPOS.png',
            ],
            [
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
            ],
            [
                'name' => 'Cash Drawer',
                'category_id' => 2,
                'quantity' => 1000,
                'unit_cost' => 31,
                'unit_price' => 49,
                'compare_price' => 63,
                'condition' => 'new',
                'description' => 'Weight: 6.5kgs, 2 Check Slots | 3 Position Lock, Black Color, Pulse Amplitude: 12V DC, Size: 405(W)×420(L)×100(H)mm',
                'keywords' => 'Cash Drawer, Cash Drawer Lebanon, POS, hardware',
                'image' => 'uploads/products/cash_drawer.png',
            ],
            [
                'name' => 'Wired 2D Barcode Scanner',
                'category_id' => 2,
                'quantity' => 1000,
                'unit_cost' => 22,
                'unit_price' => 39,
                'compare_price' => 49,
                'condition' => 'new',
                'description' => 'Wired 2D Barcode Scanner',
                'keywords' => 'Wired 2D Barcode Scanner, Barcode Scanner, Wired 2D Barcode Scanner Lebanon, POS, hardware',
                'image' => 'uploads/products/wired_2d_barcode_scanner.png',
            ],
            [
                'name' => 'Wireless 2D Barcode Scanner',
                'category_id' => 2,
                'quantity' => 1000,
                'unit_cost' => 32,
                'unit_price' => 49,
                'compare_price' => 63,
                'condition' => 'new',
                'description' => 'Wireless 2D Barcode Scanner',
                'keywords' => 'Wireless 2D Barcode Scanner, Barcode Scanner, Wireless 2D Barcode Scanner Lebanon, POS, hardware',
                'image' => 'uploads/products/wireless_2d_barcode_scanner.png',
            ],
            [
                'name' => '3D Barcode Scanner',
                'category_id' => 2,
                'quantity' => 1000,
                'unit_cost' => 65,
                'unit_price' => 87,
                'compare_price' => 99,
                'condition' => 'new',
                'description' => '3D Barcode Scanner',
                'keywords' => '3D Barcode Scanner, Barcode Scanner, 3D Barcode Scanner  Lebanon, POS, hardware',
                'image' => 'uploads/products/3d_barcode_scanner.png',
            ],
            [
                'name' => 'Receipt Printer USB Bluetooth',
                'category_id' => 2,
                'quantity' => 1000,
                'unit_cost' => 34,
                'unit_price' => 49,
                'compare_price' => 72,
                'condition' => 'new',
                'description' => 'Receipt Printer USB/Bluetooth',
                'keywords' => 'Receipt Printer USB/Bluetooth, Receipt Printer, Mobile Printer, Receipt Printer USB/Bluetooth  Lebanon, POS, hardware',
                'image' => 'uploads/products/receipt_printer.png',
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
