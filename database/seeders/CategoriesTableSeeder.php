<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('categories')->insert([
        'id' => '1',
        'category' => 'カフェ'
        ]);

        \DB::table('categories')->insert([
        'id' => '2',
        'category' => 'レストラン'
        ]);

        \DB::table('categories')->insert([
        'id' => '3',
        'category' => 'カラオケ店'
        ]);
        
        \DB::table('categories')->insert([
        'id' => '4',
        'category' => '公園'
        ]);
        
        \DB::table('categories')->insert([
        'id' => '5',
        'category' => 'テレワークボックス'
        ]);
        
        \DB::table('categories')->insert([
        'id' => '6',
        'category' => '有料ワークスペース'
        ]);
        
        \DB::table('categories')->insert([
        'id' => '7',
        'category' => '無料ワークスペース'
        ]);
        
        \DB::table('categories')->insert([
        'id' => '8',
        'category' => 'その他'
        ]);

    }
}
