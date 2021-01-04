<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuestionGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->longText('text')->nullable();
            $table->boolean('random_questions')->default(false);

            $table->foreignId('test_id');
            $table->foreign('test_id')->references('id')->on('tests');

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
        Schema::dropIfExists('question_groups');
    }
}
