<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    public function run()
    {
        DB::table('promotions')->insert([
            [
                'name' => 'Summer Sale',
                'description' => 'Discounts on summer items',
                'discount_percentage' => 20,
                'start_date' => now(),
                'end_date' => now()->addMonth(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Black Friday',
                'description' => 'Huge discounts for Black Friday',
                'discount_percentage' => 50,
                'start_date' => now(),
                'end_date' => now()->addMonth(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

