<?php

use App\Models\Setup;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //only used to indicate whether the setup has already been executed
        Schema::create('setup', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_user_id')->nullable();
            $table->foreign('admin_user_id')->references('id')->on('users');

            $table->foreignId('admin_usergroup_id')->nullable();
            $table->foreign('admin_usergroup_id')->references('id')->on('user_groups');
            $table->timestamps();
        });

        Setup::create();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setup');
    }
}
