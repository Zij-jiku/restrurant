<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->integer('user_id')->nullable();
            $table->integer('billing_id')->nullable();
            $table->float('sub_total')->nullable();
            $table->float('discount_amount')->default(0)->nullable();
            $table->string('coupon_name')->nullable();
            $table->float('total')->nullable();
            $table->integer('payment_option')->nullable();
            $table->integer('payment_status')->default(1)->nullable();
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
}
