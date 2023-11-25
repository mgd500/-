<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'email' => '0902ryoito@gmail.com',
                'password' => \Hash::make('spoi8080')
            ],
            [
                'email' => 'ryo@gmail.com',
                'password' => \Hash::make('spoi8080')
            ]
        ]);
    }
}
