<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('avaible_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_vacancy_id')->constrained('jobs_vacancies');
            $table->string('position');
            $table->bigInteger('capacity');
            $table->bigInteger('apply_capacity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaible_positions');
    }
};
