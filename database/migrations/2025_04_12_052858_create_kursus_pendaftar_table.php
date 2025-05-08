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
        Schema::create('kursus_pendaftar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftar_id')
                ->constrained('pendaftars')->cascadeOnDelete();
            $table->foreignId('kursus_id')
                ->constrained('kursuses')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursus_pendaftar');
    }
};
