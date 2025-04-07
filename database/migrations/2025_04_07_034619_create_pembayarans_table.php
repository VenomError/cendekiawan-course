<?php

use App\Enum\PembayaranStatus;
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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftar_id')->constrained('pendaftars')->cascadeOnDelete();
            $table->foreignId('kursus_id')->constrained('kursuses')->cascadeOnDelete();

            $table->decimal('amount');
            $table->enum('status' , PembayaranStatus::values())->default(PembayaranStatus::PENDING->value);
            $table->string('receipt');
            $table->timestamp('payment_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
