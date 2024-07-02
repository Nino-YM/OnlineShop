<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'image_url' => 'https://example.com/images/product1.jpg',
                'image_name' => 'product1.jpg',
                'name' => 'Smartphone',
                'description' => 'Latest model smartphone',
                'price' => 699.99,
                'stock_quantity' => 50,
                'category_id' => 1,
            ],
            [
                'image_url' => 'https://example.com/images/product2.jpg',
                'image_name' => 'product2.jpg',
                'name' => 'T-shirt',
                'description' => 'Comfortable cotton t-shirt',
                'price' => 19.99,
                'stock_quantity' => 200,
                'category_id' => 2,
            ],
        ]);
    }
}
