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

            $table->string('kode_bmn', 50)->unique();
            $table->string('tipe');

            $table->string('merk')->nullable();

            // Tambahan identitas perangkat
            $table->string('serial_number', 20)->nullable()->unique(); 
            $table->string('imei', 20)->nullable()->unique();

            $table->year('tahun_pengadaan')->nullable();

            $table->enum('kondisi', [
                'baik',
                'rusak ringan',
                'rusak berat',
                'hilang'
            ])->default('baik');

            $table->enum('status', [
                'tersedia',
                'dipakai'
            ])->default('tersedia');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};