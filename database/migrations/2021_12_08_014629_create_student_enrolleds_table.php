<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEnrolledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_enrollment', function (Blueprint $table) {
            $table->increments('enrollmentID')->autoIncrement();
            $table->string('enrollmentYear')->nullable();
            $table->string('enrollmentStatus')->nullable();

            $table->integer('user_id')->unsigned();

            $table->integer('subjectID')->unsigned();
            $table->foreign('subjectID')->references('subjectID')->on('subjects')->onUpdate('cascade');

            $table->integer('subject_scheduleID')->unsigned();
            $table->foreign('subject_scheduleID')->references('subject_scheduleID')->on('subject_schedule')->onUpdate('cascade');

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
        Schema::dropIfExists('student_enrolled');
    }
}
