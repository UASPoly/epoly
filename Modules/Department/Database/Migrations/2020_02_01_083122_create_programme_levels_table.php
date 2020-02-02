<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammeLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programme_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('programme_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('programmes')
            ->delete('restrict')
            ->update('cascade');
            $table->string('name');
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
        Schema::dropIfExists('programme_levels');
    }
}
