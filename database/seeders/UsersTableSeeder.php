<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'なかお',
            'email' => 'nakao@example.com',
            'password' => Hash::make('nakao'),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'もも',
            'email' => 'momo@example.com',
            'password' => Hash::make('momo'),
        ];
        DB::table('users')->insert($param);
    }
}
