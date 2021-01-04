<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTestGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);

            $table->foreignId('parent_test_group_id')->nullable();
            $table->foreign('parent_test_group_id')->references('id')->on('test_groups');

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
        Schema::dropIfExists('test_groups');
    }
}
