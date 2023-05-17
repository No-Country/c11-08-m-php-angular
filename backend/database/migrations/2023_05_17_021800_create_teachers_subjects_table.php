<?php

use App\Models\Subject;
use App\Models\Teacher;
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
        Schema::create('teachers_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Teacher::class);
            $table->foreignIdFor(Subject::class);
            $table->integer('years_experience');
            $table->enum('level', ['Básico', 'Intermedio', 'Avanzado']);
            $table->string('certificate_file');
            $table->softDeletes();
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
        Schema::dropIfExists('teachers_subjects');
    }
};
