<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleChoiceQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_choice_questions', function (Blueprint $table) {
            $table->foreignId('id');
            $table->foreign('id')->references('id')->on('questions');
            $table->primary('id');

            $table->boolean('random_order')->default(false);
            $table->boolean('multiple')->default(false);
            $table->smallInteger('rights')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multiple_choice_questions');
    }
}
