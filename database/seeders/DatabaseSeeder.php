<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PriceRangesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SpotsTableSeeder::class);
        $this->call(PostSeeder::class);
    }
}
