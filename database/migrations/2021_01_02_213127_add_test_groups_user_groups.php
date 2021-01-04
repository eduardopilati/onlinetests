<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTestGroupsUserGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_groups_user_groups', function (Blueprint $table) {
            $table->foreignId('test_group_id');
            $table->foreign('test_group_id')->references('id')->on('test_groups');

            $table->foreignId('user_group_id');
            $table->foreign('user_group_id')->references('id')->on('user_groups');

            $table->primary(['test_group_id', 'user_group_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_groups_user_groups');
    }
}
