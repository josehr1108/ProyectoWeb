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
            $table->string('information',300);
            $table->string('image',500);
            $table->string('expiration_date', 20);
            $table->string('type', 50);
            $table->tinyInteger('discount');
            $table->integer('original_price');
            $table->integer('current_price');
            $table->string('city', 20);
            $table->string('address',300);
            $table->string('schedule',300);
            $table->string('use_interval',300);
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
        Schema::dropIfExists('coupons');
    }
}
