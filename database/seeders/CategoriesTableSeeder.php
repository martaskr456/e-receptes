<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Brokastis'],
            ['name' => 'Pusdienas'],
            ['name' => 'Vakariņas'],
            ['name' => 'Zupas'],
            ['name' => 'Deserti'],
            ['name' => 'Uzkodas un salāti'],
            ['name' => 'Pankūkas'],
        ]);
    }
}
