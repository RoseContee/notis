<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->integer('ref_by')->nullable();
            $table->tinyInteger('ref_done')->default(0);
            $table->integer('a_cash')->default(0);
            $table->tinyInteger('is_system')->default(0);
            $table->tinyInteger('referral')->default(0);
            $table->tinyInteger('onetime')->default(0);
            $table->tinyInteger('agreement')->default(0);
            $table->tinyInteger('interest_id')->nullable();
            $table->text('signature')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
        \App\Models\User::create(['name'=> 'Super Admin', 'email' => 'admin@admin.com', 'password' => \Illuminate\Support\Facades\Hash::make('password')]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
