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
    public function run(): void
    {
        $this->call(FoodSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TableSeeder::class);
    }
}
