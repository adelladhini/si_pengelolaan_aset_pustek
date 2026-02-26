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

        $table->string('nama_tablet');
        $table->string('serial_number')->unique();
        $table->string('imei')->unique();

        $table->enum('kondisi', ['Baik', 'Rusak Ringan', 'Rusak Berat'])
              ->default('Baik');

        $table->enum('status', ['Tersedia', 'Dipinjam', 'Perbaikan'])
              ->default('Tersedia');

        $table->foreignId('pegawai_id')
              ->nullable()
              ->unique() // supaya 1 pegawai cuma bisa punya 1 tablet
              ->constrained('pegawai')
              ->onDelete('set null');

        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};