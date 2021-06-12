<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->string('billing_first_name')->nullable();
            $table->string('billing_last_name')->nullable();
            $table->string('billing_company')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('billing_address_1')->nullable();
            $table->string('billing_address_2')->nullable();
            $table->string('billing_postcode')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_email')->nullable();
            $table->integer('createaccount')->default(1)->nullable();
            $table->longText('address')->nullable();
            $table->longText('order_comments')->nullable();
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
        Schema::dropIfExists('billings');
    }
}
