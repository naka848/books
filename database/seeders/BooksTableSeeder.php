<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'purchase_date' => '2019-01-20',
        ];
        DB::table('books')->insert($param);
    
        $param = [
            'purchase_date' => '2019-06-14',
        ];
        DB::table('books')->insert($param);

        $param = [
            'purchase_date' => '2020-08-14',
        ];
        DB::table('books')->insert($param);
    }
}
