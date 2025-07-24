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

            $table->string('name')->index();
            $table->string('slug')->nullable()->unique();
            $table->text('description');
            $table->integer('hour_duration')->default(0);
            $table->decimal('price');
            $table->string('thumbnail')->nullable();

            $table->string('teacher_name')->nullable();
            $table->string('teacher_foto')->nullable();

            $table->json('benefits')->nullable();

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
