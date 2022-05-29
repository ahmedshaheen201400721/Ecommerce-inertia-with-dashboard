<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->string('billing_address')->nullable();
            $table->string('billing_zipcode')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_discountCode')->nullable();
            $table->integer('billing_discount')->default(0);
            $table->integer('billing_total');
            $table->integer('billing_subtotal');
            $table->integer('billing_tax');
            $table->string('Gateway')->default('stripe');
            $table->boolean('shipped')->default(0);
            $table->json('products');   // [ [product_id=>  ,qty=> ],[] ]
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
        Schema::dropIfExists('orders');
    }
};
