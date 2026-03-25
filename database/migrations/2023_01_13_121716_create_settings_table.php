<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('stripe')->default(0);
            $table->text('stripe_key')->nullable();
            $table->text('stripe_secret')->nullable();
            $table->tinyInteger('paypal')->default(0);
            $table->string('paypal_mode')->default('sandbox');
            $table->text('paypal_key')->nullable();
            $table->text('paypal_secret')->nullable();
            $table->integer('insurance_percentage')->nullable();
            $table->timestamps();
        });

        \App\Models\Setting::create(['stripe' => 0, 'stripe_key' => '',  'stripe_secret' => '', 'paypal' => 0, 'paypal_key' => '',  'paypal_secret' => '', ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
