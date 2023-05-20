<?php

use App\Models\User;
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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('title')->nullable();
            $table->text('about_me')->nullable();
            $table->text('about_class')->nullable();
            $table->string('job_title')->nullable();
            $table->integer('years_experience')->nullable();
            $table->decimal('price_one_class', 10, 2)->nullable();
            $table->decimal('price_two_classes', 10, 2)->nullable();
            $table->decimal('price_four_classes', 10, 2)->nullable();
            $table->string('certificate_file')->nullable();
            $table->tinyInteger('sample_class')->default(false);
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
        Schema::dropIfExists('teachers');
    }
};
