<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_remarks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('result_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('results')
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
        Schema::dropIfExists('result_remarks');
    }
}
