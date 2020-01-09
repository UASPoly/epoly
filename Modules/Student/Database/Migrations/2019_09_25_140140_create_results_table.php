<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    protected $hidden = ['grade','points','remark'];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('course_registration_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('course_registrations')
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
            $table->integer('lecturer_course_result_upload_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('lecturer_course_result_uploads')
            ->delete('restrict')
            ->update('cascade');
            $table->string('ca')->default('--');
            $table->string('exam')->default('--');
            $table->string('grade')->default('--');
            $table->string('points')->default(0.00);
            $table->string('amended_by')->default(0.00);
            $table->string('waved_by')->default(0.00);
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
        Schema::dropIfExists('results');
    }
}
