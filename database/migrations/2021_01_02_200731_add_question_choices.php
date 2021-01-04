<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuestionChoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_choices', function (Blueprint $table) {
            $table->id();
            $table->longText('text');
            $table->boolean('correct')->default(false);

            $table->foreignId('question_id');
            $table->foreign('question_id')->references('id')->on('multiple_choice_questions');
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
        Schema::dropIfExists('question_choices');
    }
}
