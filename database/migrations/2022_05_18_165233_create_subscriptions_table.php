<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('p_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('days')->nullable();
            $table->tinyInteger('affiliate')->default(0);
            $table->integer('affiliate_amount')->default(0);
            $table->tinyInteger('recurring');
            $table->integer('onet_time_price')->nullable();
            $table->integer('recurring_price')->nullable();
            $table->integer('number_of_profiles')->nullable();
            $table->integer('number_of_streaming')->nullable();
            $table->tinyInteger('adds')->nullable();
            $table->text('stripe_id')->nullable();
            $table->text('paypal_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('cloned_from')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
}
