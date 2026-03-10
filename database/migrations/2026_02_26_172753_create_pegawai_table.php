<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();

            // Relasi ke akun login (users)
            $table->foreignId('user_id')
                  ->nullable() // boleh null kalau belum dibuatkan akun
                  ->constrained('users')
                  ->cascadeOnDelete();

            // Data pegawai
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('jabatan');

            // Relasi satker
            $table->foreignId('satker_id')
                  ->constrained('satker')
                  ->restrictOnDelete();

            $table->date('tmt_pensiun')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->enum('status_pegawai', ['aktif','pensiun','nonaktif'])
      ->default('aktif');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};