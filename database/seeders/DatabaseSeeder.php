<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BookInformationTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(RentalsTableSeeder::class);
        // UsersTableのseederを作成
        // 内容：database>Factories>UserFactory.php
        \App\Models\User::factory(10)->create();
        // パスワードお試し用データ
        $this->call(UsersTableSeeder::class);
    }

}
