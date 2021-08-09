<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_categories')->insert([
            'id' => '1',
            'title' => 'Individuals',
            'description' => '',
        ]);
        DB::table('post_categories')->insert([
            'id' => '2',
            'title' => 'Organizations',
            'description' => '',
        ]);
    }
}
