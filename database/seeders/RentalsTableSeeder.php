<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'checkout_date' => '2021-11-03',
            'return_date' => '2021-11-15',
        ];
        DB::table('rentals')->insert($param);

        $param = [
            'user_id' => 2,
            'checkout_date' => '2021-11-06',
            'return_date' => '2021-11-10',
        ];
        DB::table('rentals')->insert($param);

        $param = [
            'user_id' => 3,
            'checkout_date' => '2021-11-15',
            'return_date' => '2021-11-14',
        ];
        DB::table('rentals')->insert($param);
    }
}
