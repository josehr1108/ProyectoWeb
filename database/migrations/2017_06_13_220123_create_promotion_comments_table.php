<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name');
            $table->string('message');
            $table->integer('promotionId')->unsigned();
            $table->timestamps();

            $table->foreign('promotionId')->references('id')->on('promotions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotion_comments');
    }
}
