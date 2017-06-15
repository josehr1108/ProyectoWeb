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
            $table->string('title',300);
            $table->string('description',600);
            $table->string('secondary_description',600);
            $table->string('image',600);
            $table->string('web_page',200);
            $table->integer('original_price');
            $table->integer('current_price');
            $table->integer('saving');
            $table->integer('discount');
            $table->string('address',400);
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
