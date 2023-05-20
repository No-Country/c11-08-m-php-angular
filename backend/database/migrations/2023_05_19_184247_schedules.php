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
            $table->enum('day',['1','2','3','4','5','6']);
            $table->enum('name',['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado']);
            $table->tinyInteger('active')->default(false);
            $table->time('start_morning')->nullable();
            $table->time('end_morning')->nullable();
            $table->time('start_afternoon')->nullable();
            $table->time('end_afternoon')->nullable();
            $table->time('start_night')->nullable();
            $table->time('end_night')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('schedules', function($table){
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
