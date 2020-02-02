<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSessionCalendarIdToSessionIdInSemesterCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('semester_calendars');
        
        Schema::create('semester_calendars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('session_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('sessions')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('semester_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('semesters')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('exam_calendar_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('exam_calendars')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('lecture_calendar_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('lecture_calendars')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('course_allocation_calendar_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('course_allocation_calendars')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('marking_calendar_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('marking_calendars')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('upload_result_calendar_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('upload_result_calendars')
            ->delete('restrict')
            ->update('cascade');
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->timestamps();
        });

        Schema::dropIfExists('session_calendars');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
