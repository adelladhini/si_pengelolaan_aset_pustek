<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        Pegawai::create([
            'nip' => '198008132009121001',
            'nama' => 'Erdinal Hendradjaja, ST., M.Sc.',
            'jabatan' => 'Kepala Pusat Teknologi Informasi',
            'unit_kerja' => 'Pustekinfo',
            'gedung' => 'Nusantara 1',
            'no_hp' => '08129394155',
            'email' => 'erdin@pustekinfo.go.id',
            'tmt_pensiun' => '2040-09-01'
        ]);

        Pegawai::create([
            'nip' => '198001082009121001',
            'nama' => 'Fariza Emra, S.T., M.Sc.',
            'jabatan' => 'Kepala Bidang Sistem Informasi dan Infrastruktur Teknologi Informasi',
            'unit_kerja' => 'Pustekinfo',
            'gedung' => 'Nusantara 1',
            'no_hp' => '08561223355',
            'email' => 'farizaa@pustekinfo.go.id',
            'tmt_pensiun' => '2038-02-01'
        ]);
    }
}