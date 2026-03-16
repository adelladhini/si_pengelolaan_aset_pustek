<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aset;

class AsetSeeder extends Seeder
{
    public function run(): void
    {
        Aset::create([
            'kode_aset' => 'TAB001',
            'nama_aset' => 'Tablet Samsung A7',
            'merk' => 'Samsung',
            'serial_number' => 'SN001',
            'imei' => '356789123456789',
            'tahun_pengadaan' => 2024,
            'kondisi' => 'baik',
            'status' => 'tersedia'
        ]);

        Aset::create([
            'kode_aset' => 'TAB002',
            'nama_aset' => 'Tablet Samsung A8',
            'merk' => 'Samsung',
            'serial_number' => 'SN002',
            'imei' => '356789123456780',
            'tahun_pengadaan' => 2024,
            'kondisi' => 'baik',
            'status' => 'tersedia'
        ]);
    }
}