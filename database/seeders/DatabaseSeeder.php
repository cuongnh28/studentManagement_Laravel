<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'=>'quan',
            'password'=>bcrypt('1'),
            'name'=>'Trung Quan',
            'email'=>'quan@gmail.com',
            'phone'=>'0336445423',
            'level'=>'1'
        ]);

        DB::table('users')->insert([
            'username'=>'cuong',
            'password'=>bcrypt('1'),
            'name'=>'Hong Cuong',
            'email'=>'cuong@gmail.com',
            'phone'=>'0336445423',
        ]);
    }
}
