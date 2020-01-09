<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('staff_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('staff')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('gender_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('genders')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('religion_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('religions')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('tribe_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('tribes')
            ->delete('restrict')
            ->update('cascade');
            $table->text('biography',50000);
            $table->text('image')->nullable();
            $table->string('address');
            $table->string('date_of_birth');
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
        Schema::dropIfExists('profiles');
    }
}
