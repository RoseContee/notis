<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('purchase_type')->nullable();
            $table->string('price_type')->nullable();
            $table->integer('price_hourly')->nullable();
            $table->integer('price_daily')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('top_bar')->default(0);
            $table->tinyInteger('featured')->default(0);
            $table->tinyInteger('new_arrival')->default(0);
            $table->tinyInteger('best_selling')->default(0);
            $table->tinyInteger('top_rated')->default(0);
            $table->tinyInteger('require_room')->default(1);
            $table->foreignId('category_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('equipment');
    }
}
