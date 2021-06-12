<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('slug')->nullable();
            $table->integer('created_by')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('image')->default('image.jpg')->nullable();
            $table->string('image_one')->default('image_one.jpg')->nullable();
            $table->string('image_two')->default('image_two.jpg')->nullable();
            $table->string('image_three')->default('image_three.jpg')->nullable();
            $table->string('image_four')->default('image_four.jpg')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
