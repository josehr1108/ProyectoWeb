<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name');
            $table->string('message');
            $table->integer('couponId')->unsigned();
            $table->timestamps();

            $table->foreign('couponId')->references('id')->on('coupons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon_comments');
    }
}
