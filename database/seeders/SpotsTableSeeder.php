<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpotsTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('spots')->insert([
        'id' => '1',
        'name' => 'コメダ珈琲店 東京医科大学病院店（東京都新宿区西新宿/西新宿駅 1分）',
        'price_range_id' => '1',
        'category_id' => '1',
        'user_id' => '1'
        ]);

        \DB::table('spots')->insert([
        'id' => '2',
        'name' => 'スターバックス コーヒー 新宿西口店（東京都新宿区西新宿/新宿駅 2分）',
        'price_range_id' => '1',
        'category_id' => '1',
        'user_id' => '2'
        ]);

        \DB::table('spots')->insert([
        'id' => '3',
        'name' => 'デニーズ南平台店（東京都渋谷区南平台町/神泉駅 5分）',
        'price_range_id' => '2',
        'category_id' => '2',
        'user_id' => '1'
        ]);

        // 略
    }
}
