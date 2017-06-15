<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',200);
            $table->string('description',500);
            $table->string('secondary_description',500);
            $table->string('image',500);
            $table->string('web_page');
            $table->integer('original_price');
            $table->integer('current_price');
            $table->integer('saving');
            $table->tinyInteger('discount');
            $table->string('address',250);
            $table->string('status')->default('activo');
            $table->integer('visitCount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
