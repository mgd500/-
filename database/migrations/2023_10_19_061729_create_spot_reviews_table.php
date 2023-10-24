<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpotReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spot_reviews', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('spot_id')->comment('施設名ID');
        $table->text('comment')->comment('コメント');
        $table->timestamps();

//$table->foreignId('spot_id')->constrained('spots')->cascadeOnDelete();
        $table->foreign('spot_id')->references('id')->on('spots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spot_reviews');
    }
};
