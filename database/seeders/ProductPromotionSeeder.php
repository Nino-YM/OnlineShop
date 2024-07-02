<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPromotionSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_promotion')->insert([
            ['product_id' => 1, 'promotion_id' => 1],
            ['product_id' => 2, 'promotion_id' => 2],
        ]);
    }
}
