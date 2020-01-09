<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('admin_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('admins')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('college_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('colleges')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('staff_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('staff')
            ->delete('restrict')
            ->update('cascade');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('is_active')->default(1);
            $table->string('from');
            $table->string('to')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('directers');
    }
}
