 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->longText('text')->nullable();
            $table->boolean('random_groups')->default(false);
            $table->decimal('maximum_grade', 10, 4)->nullable();

            $table->foreignId('owner_id');
            $table->foreign('owner_id')->references('id')->on('users');

            $table->foreignId('test_group_id');
            $table->foreign('test_group_id')->references('id')->on('test_groups');

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
        Schema::dropIfExists('tests');
    }
}
