<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    public function run()
    {
        DB::table('addresses')->insert([
            ['name' => '123 Main St', 'postal_code' => '12345', 'city' => 'New York'],
            ['name' => '456 Elm St', 'postal_code' => '54321', 'city' => 'Los Angeles'],
        ]);
    }
}
