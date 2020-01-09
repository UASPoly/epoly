<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionRegistrationRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_registration_remarks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('session_registration_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('session_registrations')
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
        Schema::dropIfExists('session_registration_remarks');
    }
}
