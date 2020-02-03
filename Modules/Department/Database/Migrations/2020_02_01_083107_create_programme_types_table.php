<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammeTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('programme_types', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('name');
        //     $table->timestamps();
        // });
        //add programme type id to programmes
        Schema::table('programmes', function (Blueprint $table) {
            $table->integer('programme_type_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('programme_types')
            ->delete('restrict')
            ->update('cascade');
        });
        //add programme id to course
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programme_types');
    }
}
