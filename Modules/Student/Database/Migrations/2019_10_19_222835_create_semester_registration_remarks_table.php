<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemesterRegistrationRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_registration_remarks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('semester_registration_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('semester_registrations')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('remark_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('remarks')
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
        Schema::dropIfExists('semester_registration_remarks');
    }
}
