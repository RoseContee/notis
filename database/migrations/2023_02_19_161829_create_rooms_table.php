<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('number')->nullable();
            $table->string('dimension')->nullable();
            $table->string('price_type')->nullable();
            $table->float('price_hourly')->nullable();
            $table->float('price_daily')->nullable();
            $table->float('price_3')->nullable();
            $table->float('price_6')->nullable();
            $table->float('price_9')->nullable();
            $table->float('price_12')->nullable();
            $table->integer('status')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('top_bar')->default(0);
            $table->tinyInteger('featured')->default(0);
            $table->tinyInteger('new_arrival')->default(0);
            $table->tinyInteger('best_selling')->default(0);
            $table->tinyInteger('top_rated')->default(0);
            $table->tinyInteger('special_request')->default(0);
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
        Schema::dropIfExists('rooms');
    }
}
