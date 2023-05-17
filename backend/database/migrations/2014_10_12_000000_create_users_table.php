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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->enum('role', ['Profesor', 'Estudiante', 'Admin']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->date('birthday')->nullable();
            $table->string('identification', 20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->foreignIdFor(\App\Models\City::class)->nullable();
            $table->timestamp('last_connection')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
