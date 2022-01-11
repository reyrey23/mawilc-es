<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('subjects')) {
            echo "Table Subject exist";
        }
        else{
            Schema::create('subjects', function (Blueprint $table) {
                $table->increments('subjectID')->autoIncrement();
                $table->string('subjectCode')->nullable();
                $table->string('subjectDescription')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
