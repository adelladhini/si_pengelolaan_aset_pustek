<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        Pegawai::create([
            'nip' => '1987654321',
            'nama' => 'Budi Santoso',
            'jabatan' => 'Analis Sistem',
            'unit_kerja' => 'Pustekinfo',
            'no_hp' => '081234567890',
            'email' => 'budi@pustekinfo.go.id',
            'tmt_pensiun' => '2045-01-01'
        ]);

        Pegawai::create([
            'nip' => '1987654322',
            'nama' => 'Siti Rahma',
            'jabatan' => 'Staff IT',
            'unit_kerja' => 'Pustekinfo',
            'no_hp' => '081298765432',
            'email' => 'siti@pustekinfo.go.id',
            'tmt_pensiun' => '2043-01-01'
        ]);
    }
}