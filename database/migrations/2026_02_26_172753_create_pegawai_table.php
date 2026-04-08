<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('nip', 18)->unique();
            $table->string('nama');
            $table->string('jabatan')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->string('gedung')->nullable();
            $table->string('no_hp', 13)->nullable();
            $table->string('email')->nullable();
            $table->date('tmt_pensiun')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};