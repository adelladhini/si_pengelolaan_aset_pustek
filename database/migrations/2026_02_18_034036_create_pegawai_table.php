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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();

            // Login
            $table->string('pengguna')->unique(); // username
            $table->string('password');

            // Data pegawai
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('jabatan')->nullable();
            $table->string('nama_satker')->nullable();
            $table->string('eselon')->nullable();
            $table->date('tmt_pensiun')->nullable();
            $table->string('no_hp', 20)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};