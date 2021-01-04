<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersUserGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_user_groups', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreignId('user_group_id');
            $table->foreign('user_group_id')->references('id')->on('user_groups');

            $table->primary(['user_id', 'user_group_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_user_groups');
    }
}
