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
        Schema::create('riwayat_aset', function (Blueprint $table) {
    $table->id();

    // Relasi ke aset
    $table->foreignId('aset_id')
          ->constrained('aset')
          ->cascadeOnDelete();

    // Relasi ke pegawai
    $table->foreignId('pegawai_id')
          ->constrained('pegawai')
          ->cascadeOnDelete();

    // Tanggal serah
    $table->date('tanggal_serah');

    // Tanggal kembali (nullable karena belum tentu sudah dikembalikan)
    $table->date('tanggal_kembali')->nullable();

    // Catatan tambahan
    $table->text('keterangan')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_aset');
    }
};