<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheps', function (Blueprint $table) {
            $table->id();
            $table->string('chep_name')->nullable();
            $table->string('position')->nullable();
            $table->string('s_one')->nullable();
            $table->string('s_two')->nullable();
            $table->string('s_three')->nullable();
            $table->string('s_four')->nullable();
            $table->string('image')->default('image.png');

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
        Schema::dropIfExists('cheps');
    }
}
