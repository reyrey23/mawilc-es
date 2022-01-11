<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_schedule', function (Blueprint $table) {
            $table->increments('subject_scheduleID')->autoIncrement();

            $table->integer('subjectID')->unsigned();
            $table->foreign('subjectID')->references('subjectID')->on('subjects')->onUpdate('cascade');

            $table->time('subjectStartTime')->nullable();
            $table->time('subjectEndTime')->nullable();
            $table->integer('subjectStatus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_schedule');
    }
}
