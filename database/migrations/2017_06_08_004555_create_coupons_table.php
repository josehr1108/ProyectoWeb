<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('information');
            $table->string('image');
            $table->string('expiration_date', 20);
            $table->string('type', 20);
            $table->tinyInteger('discount');
            $table->integer('original_price');
            $table->integer('current_price');
            $table->string('city', 20);
            $table->string('address');
            $table->string('schedule');
            $table->string('use_interval');
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
        Schema::dropIfExists('coupons');
    }
}
