<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert([
            [
                'id' => 1,
                'name' => 'Nasi Goreng',
                'description' => 'Nasi Goreng',
                'image' => 'nasigoreng.png'
            ],
            [
                'id' => 2,
                'name' => 'Mi Goreng',
                'description' => 'Mi Goreng',
                'image' => 'migoreng.png'
            ],
            [
                'id' => 3,
                'name' => 'Ayam Goreng',
                'description' => 'Ayam Goreng',
                'image' => 'ayamgoreng.png'
            ],

        ]);
    }
}
