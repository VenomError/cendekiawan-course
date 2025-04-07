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
        Schema::create('kursuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftar_id')
                ->constrained('pendaftars')->cascadeOnDelete();

            $table->string('name');
            $table->text('description');
            $table->integer('duration')->default(0);
            $table->decimal('price');
            $table->boolean('is_available')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursuses');
    }
};
