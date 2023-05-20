<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->enum('day',['0','1','2','3','4','5']);
            $table->enum('name',['lunes','martes','miercoles','jueves','viernes','sabado']);
            $table->tinyInteger('active')->default(false);
            $table->time('start_morning');
            $table->time('end_morning');
            $table->time('start_afternoon');
            $table->time('end_afternoon');
            $table->time('start_night');
            $table->time('end_night');
        });

        Schema::table('reviews', function($table){
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
