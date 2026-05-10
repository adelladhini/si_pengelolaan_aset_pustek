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
            'email' => ' ',
            'tmt_pensiun' => '2040-09-01'
        ]);

        Pegawai::create([
            'nip' => '198001082009121001',
            'nama' => 'Fariza Emra, S.T., M.Sc.',
            'jabatan' => 'Kepala Bidang Sistem Informasi dan Infrastruktur Teknologi Informasi',
            'unit_kerja' => 'Pusat Teknologi Informasi',
            'gedung' => 'Nusantara 1',
            'no_hp' => '08561223355',
            'email' => 'farizaa@pustekinfo.go.id',
            'tmt_pensiun' => '2038-02-01'
        ]);

        Pegawai::create([
            'nip' => '197505132009121001',
            'nama' => 'Wiranto Utomo, S.Si.,M.Kom. ',
            'jabatan' => 'Pranata Komputer Ahli Muda',
            'unit_kerja' => 'Pusat Teknologi Informasi',
            'gedung' => 'Nusantara 1',
            'no_hp' => ' ',
            'email' => ' ',
            'tmt_pensiun' => ' '
        ]);

        Pegawai::create([
            'nip' => '197604021996032001',
            'nama' => 'Tri Ari Pujirahayu',
            'jabatan' => 'Penelaah Teknis Kebijakan',
            'unit_kerja' => 'Pusat Teknologi Informasi',
            'gedung' => 'Nusantara 1',
            'no_hp' => ' ',
            'email' => ' ',
            'tmt_pensiun' => ' '
        ]);

        Pegawai::create([
            'nip' => '196912201998031003',
            'nama' => 'Budi Wuryanto, S.H.',
            'jabatan' => 'Kepala Bagian Pembentukan Produk Hukum',
            'unit_kerja' => 'Bagian Pembentukan Produk Hukum',
            'gedung' => ' ',
            'no_hp' => '081218561709',
            'email' => ' ',
            'tmt_pensiun' => '2028-01-01'
        ]);

        Pegawai::create([
            'nip' => '198506102009122003',
            'nama' => 'Rahayu Yuni Susanti, S.T., M.T.I.',
            'jabatan' => 'Kepala Bidang Tata Kelola Informasi',
            'unit_kerja' => 'Tata Kelola Teknologi Informasi ',
            'gedung' => 'Nusanntara 1 ',
            'no_hp' => '08112102010',
            'email' => ' ',
            'tmt_pensiun' => '2043-07-01'
        ]);

        Pegawai::create([
            'nip' => '198210032009121001',
            'nama' => 'Airlangga Eka Wardhana, S.Kom.,M.T.I.',
            'jabatan' => 'Pranata Komputer Ahli Madya',
            'unit_kerja' => 'Pusat Teknologi Informasi',
            'gedung' => 'Nusanntara 1',
            'no_hp' => '',
            'email' => ' ',
            'tmt_pensiun' => ' '
        ]);

        Pegawai::create([
            'nip' => '198609302005022001',
            'nama' => 'Imas Arianinsih, S.Sos., M.Si.',
            'jabatan' => 'Kepala Subbagian Tata Usaha Sekretariat Komisi XI',
            'unit_kerja' => 'Bagian Sekretariat Komisi XI',
            'gedung' => '',
            'no_hp' => '081318113086',
            'email' => ' ',
            'tmt_pensiun' => '2044-10-01'
        ]);

        Pegawai::create([
            'nip' => '197410261999031004',
            'nama' => 'Danis Maya, S.H.',
            'jabatan' => 'Kepala Bagian Sekretariat Komisi XI',
            'unit_kerja' => 'Bagian Sekretariat Komisi XI',
            'gedung' => '',
            'no_hp' => '081293972001',
            'email' => ' ',
            'tmt_pensiun' => '2032-11-01'
        ]);

        Pegawai::create([
            'nip' => '196908021990031002',
            'nama' => 'Hernadi, S.IP., M.Si.',
            'jabatan' => 'Kepala Bagian Sekretariat Komisi I',
            'unit_kerja' => 'Bagian Sekretariat Komisi I',
            'gedung' => '',
            'no_hp' => '081310080477',
            'email' => ' ',
            'tmt_pensiun' => '2027-09-01'
        ]);

        Pegawai::create([
            'nip' => '197109111997031005',
            'nama' => 'Dr. Asep Ahmad Saefuloh, S.E., M.Si., QGIA. QIA',
            'jabatan' => 'Inspektur I',
            'unit_kerja' => 'Inspektorat 1',
            'gedung' => '',
            'no_hp' => '085903732515',
            'email' => ' ',
            'tmt_pensiun' => '2031-10-01'
        ]);

        Pegawai::create([
            'nip' => '197108051999031006',
            'nama' => 'Sjaepudin, S.Sos.',
            'jabatan' => 'Kepala Subbagian Tata Usaha Inspektorat I',
            'unit_kerja' => 'Inspektorat 1',
            'gedung' => '',
            'no_hp' => '081318989809',
            'email' => ' ',
            'tmt_pensiun' => '2029-09-01'
        ]);

        Pegawai::create([
            'nip' => '197106242000031003',
            'nama' => 'Mc. Zaqki Zachariaz Thamrin, S.S., M.Si.',
            'jabatan' => 'Kepala Bagian Sekretariat Komisi VIII',
            'unit_kerja' => 'Bagian Sekretariat Komisi VIII',
            'gedung' => '',
            'no_hp' => '082110328998',
            'email' => ' ',
            'tmt_pensiun' => '2029-07-01'
        ]);

        Pegawai::create([
            'nip' => '197109131997032001',
            'nama' => 'Chrysanthi Permatasari, S.H.',
            'jabatan' => 'Kepala Bagian Sekretariat Komisi III',
            'unit_kerja' => 'Bagian Sekretariat Komisi III',
            'gedung' => '',
            'no_hp' => '081311103234',
            'email' => ' ',
            'tmt_pensiun' => '2029-10-01'
        ]);
    }
}

