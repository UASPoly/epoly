<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadResultCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_result_calendars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('semester_calendar_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('semester_calendars')
            ->delete('restrict')
            ->update('cascade');
            $table->string('start');
            $table->string('end');
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
        Schema::dropIfExists('upload_result_calendars');
    }
}
