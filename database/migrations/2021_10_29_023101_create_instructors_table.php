<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('instructors')) {
            echo "Table instructors exist";
        }
        else{
            Schema::create('instructors', function (Blueprint $table) {
                $table->increments('instructorID')->autoIncrement();
                $table->string('instructorName')->nullable();
                $table->string('instructorDescription')->nullable();
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
        Schema::dropIfExists('instructors');
    }
}
