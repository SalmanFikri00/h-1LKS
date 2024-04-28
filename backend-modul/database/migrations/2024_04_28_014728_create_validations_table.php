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
        Schema::create('validators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('role', ['officer', 'validator']);
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('validations' , function ( Blueprint $table) {
            $table->id();
            $table->foreignId('job_category_id')->constrained('job_categories');
            $table->foreignId('society_id')->constrained('societies');
            $table->foreignId('validator_id')->nullable()->constrained('validators');
            $table->enum('status' , ['accepted' , 'declined' , 'pending'])->default('pending');
            $table->text('work_experience');
            $table->text('job_position');
            $table->text('reasons_accepted');
            $table->text('validator_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validations');
    }
};
