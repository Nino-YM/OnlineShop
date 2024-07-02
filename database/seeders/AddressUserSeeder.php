<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('address_user')->insert([
            ['user_id' => 1, 'address_id' => 1],
            ['user_id' => 2, 'address_id' => 2],
        ]);
    }
}
