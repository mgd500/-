<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id()->comment('種類ID');
            //$table->increments('id')->comment('種類ID');
            $table->string('category')->comment('種類（カフェ/レストラン/カラオケ店/公園/テレワークボックス/有料ワークスペース/無料ワークスペース/その他）');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_categories');
    }
};
