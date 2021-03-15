<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use UsersTableSeeder;

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
        $this->call(UsersTableSeeder::class);//Оно не видит класс
    }
}
