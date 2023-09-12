<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique()->nullable();
            $table->rememberToken();
            $table->string('mobile')->unique()->nullable();
            $table->integer('balance')->default(0);
            $table->string('password');
            $table->unsignedBigInteger('club_id')->nullable();
            $table->unsignedBigInteger('sponser_id')->nullable();
            // other
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_club')->default(false);
            $table->boolean('is_user')->default(true);
            $table->boolean('is_super')->default(true);
            $table->string('club_owner')->nullable();
            $table->string('club_mobile')->nullable();
            $table->string('club_address')->nullable();
            $table->integer('club_commission')->nullable();

            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('users');
    }
};
