<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_product')->insert([
            ['order_id' => 1, 'product_id' => 1, 'quantity' => 1, 'price' => 699.99],
            ['order_id' => 2, 'product_id' => 2, 'quantity' => 2, 'price' => 19.99],
        ]);
    }
}
