<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuestionTextAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_text_answers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('question_answer_id');
            $table->foreign('question_answer_id')->references('id')->on('question_answers');

            $table->longText('text');

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
        Schema::dropIfExists('question_text_answers');
    }
}
