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
        Schema::create('question_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matche_id');
            $table->foreignId('matche_question_id')->constrained('matche_questions')->onDelete('cascade');
            $table->string('title');
            $table->float('bet_rate');
            $table->boolean('is_hide')->default(false);
            $table->boolean('is_win')->default(false);
            $table->boolean('is_loss')->default(false);
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
        Schema::dropIfExists('question_options');
    }
};
