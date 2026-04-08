<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aset;

class AsetSeeder extends Seeder
{
    public function run(): void
    {
        Aset::create([
            'kode_bmn' => '871',
            'tipe' => 'Tablet Samsung A8',
            'merk' => 'Samsung',
            'serial_number' => 'RR2T5006QHZ',
            'imei' => '352952652338787',
            'tahun_pengadaan' => 2022,
            'kondisi' => 'baik',
            'status' => 'tersedia'
        ]);

        Aset::create([
            'kode_bmn' => '873',
            'tipe' => 'Tablet Samsung A8',
            'merk' => 'Samsung',
            'serial_number' => 'RR2T5006QNB',
            'imei' => '352952652338837',
            'tahun_pengadaan' => 2022,
            'kondisi' => 'baik',
            'status' => 'tersedia'
        ]);
    }
}