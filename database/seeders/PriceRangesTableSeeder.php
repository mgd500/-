<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceRangesTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('price_ranges')->insert([
        'id' => '1',
        'price_range' => '¥0〜1,000'
        ]);

        \DB::table('price_ranges')->insert([
        'id' => '2',
        'price_range' => '¥1,000〜3,000'
        ]);

        \DB::table('price_ranges')->insert([
        'id' => '3',
        'price_range' => '¥3,000〜'
        ]);
    }
}
