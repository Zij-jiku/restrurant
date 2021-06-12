<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('food_name')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('tag_id')->nullable();
            $table->float('price')->nullable();
            $table->string('code')->nullable();
            $table->string('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('alert_quantity')->nullable();
            $table->string('image')->default('image.png')->nullable();
            $table->string('big_image')->default('big_image.jpg')->nullable();
            $table->longText('slug')->nullable();
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
        Schema::dropIfExists('food');
    }
}
