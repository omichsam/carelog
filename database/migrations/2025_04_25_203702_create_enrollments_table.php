<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('program_id')->constrained('programs');
            $table->foreignId('enrolled_by')->constrained('users');
            $table->text('notes')->nullable();
            $table->enum('status', ['active', 'completed', 'dropped'])->default('active');
            $table->dateTime('enrolled_at')->default(now());
            $table->dateTime('exited_at')->nullable();

            $table->unique(['patient_id', 'program_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};