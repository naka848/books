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
            'book_information_id' => 1,
            'purchase_date' => '2019-01-20',
            'availability' => true,
        ];
        DB::table('books')->insert($param);
    
        $param = [
            'book_information_id' => 2,
            'purchase_date' => '2019-06-14',
            'availability' => true,
        ];
        DB::table('books')->insert($param);

        $param = [
            'book_information_id' => 3,
            'purchase_date' => '2020-08-14',
            'availability' => false,
        ];
        DB::table('books')->insert($param);

        $param = [
            'book_information_id' => 4,
            'purchase_date' => '2021-10-27',
            'availability' => true,
        ];
        DB::table('books')->insert($param);

        $param = [
            'book_information_id' => 1,
            'purchase_date' => '2021-09-27',
            'availability' => false,
        ];
        DB::table('books')->insert($param);

    }
}
