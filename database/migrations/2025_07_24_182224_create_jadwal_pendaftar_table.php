<?php

use App\Models\Jadwal;
use App\Models\Pendaftar;
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
        Schema::create('jadwal_pendaftar', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Jadwal::class , 'jadwal_id');
            $table->foreignIdFor(Pendaftar::class , 'pendaftar_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pendaftar');
    }
};
