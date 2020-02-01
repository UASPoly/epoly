<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammeTypeLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programme_type_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('programme_type_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('programme_types')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('level_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('levels')
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
        Schema::dropIfExists('programme_type_levels');
    }
}
