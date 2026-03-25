<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('year')->nullable();
            $table->string('duration')->nullable();
            $table->string('access');
            $table->text('trailer')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('number_of_video_ads')->nullable();
            $table->tinyInteger('adult')->default(1);
            $table->tinyInteger('top_scroll')->default(0);
            $table->tinyInteger('new_release')->default(0);
            $table->tinyInteger('upcoming')->default(0);
            $table->string('movie_file_type')->default('local');
            $table->text('movie_link')->nullable();
            $table->dateTime('date_sort');
            $table->foreignId('user_id')
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
        Schema::dropIfExists('movies');
    }
}
