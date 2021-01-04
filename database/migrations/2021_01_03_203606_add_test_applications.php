<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTestApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_applications', function (Blueprint $table) {
            $table->id();

            $table->string('token', 40);
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->decimal('grade', 10, 4)->nullable();

            $table->foreignId('test_id');
            $table->foreign('test_id')->references('id')->on('tests');

            $table->foreignId('applicant_id');
            $table->foreign('applicant_id')->references('id')->on('applicants');

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
        Schema::dropIfExists('test_applications');
    }
}
