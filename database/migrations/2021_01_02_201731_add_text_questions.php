<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTextQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_questions', function (Blueprint $table) {
            $table->foreignId('id');
            $table->foreign('id')->references('id')->on('questions');
            $table->primary('id');

            $table->mediumInteger('min_characters')->default(50);
            $table->mediumInteger('max_characters')->default(300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text_questions');
    }
}
