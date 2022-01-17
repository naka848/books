<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'title' => 'Vue.js3 超入門',
            'author' => '掌田津耶野',
            'publisher' => '秀和システム',
            'published' => '2020-12-25',
        ];
        DB::table('book_information')->insert($param);

        $param = [
            'title' => 'Laravel入門 第2版',
            'author' => '掌田津耶野',
            'publisher' => '秀和システム',
            'published' => '2020-01-01',
        ];
        DB::table('book_information')->insert($param);

        $param = [
            'title' => 'Laravel Webアプリケーション開発',
            'author' => '竹澤有貴',
            'publisher' => 'ソシム',
            'published' => '2021-06-10',
        ];
        DB::table('book_information')->insert($param);

        $param = [
            'title' => 'これからはじめるVue.js実践入門',
            'author' => '山田祥寛',
            'publisher' => 'SBクリエイティブ',
            'published' => '2019/8/21',
        ];
        DB::table('book_information')->insert($param);
    }
}
