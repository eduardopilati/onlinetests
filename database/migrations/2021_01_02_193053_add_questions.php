<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->longText('text')->nullable();
            $table->string('type')->nullable();
            $table->decimal('maximum_grade', 10, 4)->nullable();

            $table->foreignId('question_group_id');
            $table->foreign('question_group_id')->references('id')->on('question_groups');
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
        Schema::dropIfExists('questions');
    }
}
