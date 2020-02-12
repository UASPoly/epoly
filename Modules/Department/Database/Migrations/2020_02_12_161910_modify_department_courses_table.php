<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyDepartmentCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('department_courses', function (Blueprint $table) {
            $table->integer('semester_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('semesters')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('programme_level_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('programme_levels')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('programme_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('programmes')
            ->delete('restrict')
            ->update('cascade');
            $table->string('unit');
        });
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
