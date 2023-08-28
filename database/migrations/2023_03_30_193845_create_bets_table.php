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
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('matche_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('option_id');
            $table->unsignedBigInteger('club_id')->nullable();
            $table->unsignedBigInteger('sponsor_id')->nullable();
            $table->float('bet_amount');
            $table->float('bet_rate');
            $table->float('return_amount');
            $table->float('club_commission')->nullable();
            $table->float('sponsor_commission')->nullable();
            $table->string('match_title');
            $table->string('question_title');
            $table->string('option_title');
            $table->enum('status',['win','loss','refund','pending'])->default('pending');
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
        Schema::dropIfExists('bets');
    }
};
