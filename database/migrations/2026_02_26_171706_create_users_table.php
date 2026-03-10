<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Informasi dasar akun
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');

            // Role sistem
            $table->enum('role', [
                'admin',
                'operator'
            ])->default('operator');

            // Status akun (aktif / nonaktif)
            $table->boolean('status')->default(true);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};