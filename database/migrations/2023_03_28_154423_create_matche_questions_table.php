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
        Schema::create('matche_questions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('matche_id')->constrained('matches')->onDelete('cascade');
            $table->boolean('is_hide')->nullable()->default(0);
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
        Schema::dropIfExists('matche_questions');
    }
};
