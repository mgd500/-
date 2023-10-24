<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceRangesTable extends Migration
{
    public function up()
    {
        Schema::create('price_ranges', function (Blueprint $table) {
            $table->id();
            //$table->increments('id')->comment('料金帯ID');
            $table->string('price_range')->comment('料金帯名（¥0〜1,000/¥1,000〜3,000/¥3,000〜）');
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_price_ranges');
    }
};
