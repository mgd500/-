<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpotsTable extends Migration
{
    public function up()
    {
        Schema::create('spots', function (Blueprint $table) {
            $table->id()->comment('施設名ID');
            //$table->increments('id')->comment('施設名ID');
            $table->string('name')->comment('施設名');
            $table->timestamps();
            //$table->unsignedInteger('category_id');
            $table->foreignId('category_id')->constrained('categories')->comment('種類ID')->cascadeOnDelete();
            //外部キー制約の設定
            $table->foreignId('price_range_id')->constrained('price_ranges')->comment('料金帯ID')->cascadeOnDelete();
            //$table->foreignId('category2_id')->constrained('categories')->comment('種類ID')->cascadeOnDelete();
            //$table->foreign('price_range_id')->references('id')->on('price_ranges')->comment('料金帯ID')->onDelete('cascade');
            //$table->foreign('category_id')->references('id')->on('categories')->comment('種類ID');
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_spots');
    }
};
