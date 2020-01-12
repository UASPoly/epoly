<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentProgrammeSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_programme_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('schedule_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('schedules')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('department_programme_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('department_programmes')
            ->delete('restrict')
            ->update('cascade');
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
        Schema::dropIfExists('department_programme_schedules');
    }
}
