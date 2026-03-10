<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aset', function (Blueprint $table) {
            $table->id();

            // Informasi dasar aset
            $table->string('nama_aset');
            $table->string('serial_number')->unique();
            $table->string('imei')->unique();

            // Kondisi fisik
            $table->enum('kondisi', [
                'Baik',
                'Rusak Ringan',
                'Rusak Berat'
            ])->default('Baik');

            // Status penggunaan
            $table->enum('status', [
                'Tersedia',
                'Digunakan',
                'Perbaikan'
            ])->default('Tersedia');

            // Relasi ke pegawai (nullable kalau belum dipakai)
            $table->foreignId('pegawai_id')
                  ->nullable()
                  ->constrained('pegawai')
                  ->nullOnDelete();
            
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
