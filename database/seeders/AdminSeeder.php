<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Pegawai::create([
            'pengguna' => 'admin',
            'password' => Hash::make('123456'),
            'nama' => 'Administrator',
            'nip' => '1234567890',
            'jabatan' => 'Admin Sistem',
            'eselon' => null,
            'nama_satker' => 'Pustekinfo',
            'no_hp' => '08123456789',
            'tmt_pensiun' => null,
        ]);
    }
}