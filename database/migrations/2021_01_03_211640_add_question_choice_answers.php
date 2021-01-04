<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuestionChoiceAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_choice_answers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('question_answer_id');
            $table->foreign('question_answer_id')->references('id')->on('question_answers');

            $table->foreignId('question_choice_id');
            $table->foreign('question_choice_id')->references('id')->on('question_choices');
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
        Schema::dropIfExists('question_choice_answers');
    }
}
