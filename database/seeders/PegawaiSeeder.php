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

        Pegawai::create([
            'nip' => '198111302010031001',
            'nama' => 'Muhammad Nasir, ST., M.Si.',
            'jabatan' => 'Kepala Subbagian Rapat Sekretariat Komisi VIII',
            'unit_kerja' => 'Bagian Sekretariat Komisi VIII',
            'gedung' => '',
            'no_hp' => '081381237656',
            'email' => ' ',
            'tmt_pensiun' => '2039-12-01'
        ]);

        Pegawai::create([
            'nip' => '198210172009121001',
            'nama' => 'Evlin Haditama, S.T.',
            'jabatan' => 'Pranata Komputer Ahli Madya',
            'unit_kerja' => 'Pusat Teknologi Informasi',
            'gedung' => '',
            'no_hp' => '',
            'email' => ' ',
            'tmt_pensiun' => ' '
        ]);

        Pegawai::create([
            'nip' => '198211082025211026',
            'nama' => 'Fajar Suryanto',
            'jabatan' => 'Operator Layanan Operasional ',
            'unit_kerja' => 'Bidang Tata Kelola Teknologi Informasi ',
            'gedung' => '',
            'no_hp' => '',
            'email' => ' ',
            'tmt_pensiun' => ' '
        ]);

        Pegawai::create([
            'nip' => '198111012005022001',
            'nama' => 'Anggrek Kurnianti, S.H., M.H.',
            'jabatan' => 'Kepala Bagian Sekretariat Komisi VI',
            'unit_kerja' => 'Bagian Sekretariat Komisi VI',
            'gedung' => '',
            'no_hp' => '0817111081',
            'email' => ' ',
            'tmt_pensiun' => '2039-12-01'
        ]);

        Pegawai::create([
            'nip' => '197603091997032002',
            'nama' => 'Nanik Sulistyawati, S.A.P.',
            'jabatan' => 'Kepala Subbagian Rapat Sekretariat Komisi VI',
            'unit_kerja' => 'Bagian Sekretariat Komisi VI',
            'gedung' => '',
            'no_hp' => '081294098844',
            'email' => ' ',
            'tmt_pensiun' => '2034-04-01'
        ]);

        Pegawai::create([
            'nip' => '197705121999031003',
            'nama' => 'Keya Muhamad Nurcahyo, S.Sos., M.AP',
            'jabatan' => 'Kepala Subbagian Tata Usaha Sekretariat Komisi VI',
            'unit_kerja' => 'Bagian Sekretariat Komisi VI',
            'gedung' => '',
            'no_hp' => '081218011949',
            'email' => ' ',
            'tmt_pensiun' => '2035-06-01'
        ]);

        Pegawai::create([
            'nip' => '197409241998031002',
            'nama' => 'Dani Hamdani,S.Pd.',
            'jabatan' => 'Kepala Subbagian Tata Usaha Pusat Analisis Keparlemenan',
            'unit_kerja' => 'Pusat Analisis Keparlemenan',
            'gedung' => '',
            'no_hp' => '',
            'email' => ' ',
            'tmt_pensiun' => ' '
        ]);

        Pegawai::create([
            'nip' => '198409202005021001',
            'nama' => 'Indrianto, S.H.',
            'jabatan' => 'Kepala Subbagian Tata Usaha Sekretariat Komisi I',
            'unit_kerja' => 'Bagian Sekretariat Komisi I',
            'gedung' => '',
            'no_hp' => '081287457426',
            'email' => ' ',
            'tmt_pensiun' => '2042-10-01'
        ]);

        Pegawai::create([
            'nip' => '197004221990032001',
            'nama' => 'Lilis Suryani, S.E.',
            'jabatan' => 'Kepala Subbagian Tata Usaha Sekretariat Komisi IX',
            'unit_kerja' => 'Bagian Sekretariat Komisi IX',
            'gedung' => '',
            'no_hp' => '08128009788',
            'email' => ' ',
            'tmt_pensiun' => '2028-05-01'
        ]);

        Pegawai::create([
            'nip' => '198205172002122001',
            'nama' => 'Meitryanti, S.E.',
            'jabatan' => 'Kepala Subbagian Promosi, Diseminasi, dan Edukasi Publik',
            'unit_kerja' => 'Bagian Hubungan Masyarakat dan Pengelolaan Museum ',
            'gedung' => '',
            'no_hp' => '087882251706',
            'email' => ' ',
            'tmt_pensiun' => '2040-06-01'
        ]);

        Pegawai::create([
            'nip' => '197108291993022001',
            'nama' => 'Turi Handayani,S.Sos.',
            'jabatan' => 'Kepala Subbagian Tata Usaha Pusat Pemantauan Pelaksanaan Undang-undang',
            'unit_kerja' => 'Pusat Pemantauan Pelaksanaan Undang-undang ',
            'gedung' => '',
            'no_hp' => '',
            'email' => ' ',
            'tmt_pensiun' => ' '
        ]);

        Pegawai::create([
            'nip' => '197111211999031003',
            'nama' => 'Dwi Frihartomo, S.H., M.H.',
            'jabatan' => 'Kepala Bagian Pertimbangan dan Dokumentasi Informasi Hukum',
            'unit_kerja' => 'Bagian Pertimbangan dan Dikomunikasi Informasi Hukum ',
            'gedung' => '',
            'no_hp' => '0818737535',
            'email' => '',
            'tmt_pensiun' => '2029-12-01'
        ]);

        Pegawai::create([
            'nip' => '197307221998031001',
            'nama' => 'Koko Surya Dharma, A.K.S., M.Si.',
            'jabatan' => 'Kepala Bagian Pengelolaan Kinerja Organisasi dan Reformasi Birokrasi',
            'unit_kerja' => 'Bagian Pengelolaan Kinerja Organisasi dan Reformasi Birokrasi',
            'gedung' => '',
            'no_hp' => '081312349162',
            'email' => ' ',
            'tmt_pensiun' => '2031-08-01'
        ]);

        Pegawai::create([
            'nip' => '198101032005021004',
            'nama' => 'Rendy Alvaro, S.Sos., M.E.',
            'jabatan' => 'Kepala Bagian Organisasi dan Tata Laksana',
            'unit_kerja' => 'Bagian Organisasi dan Tata Laksana',
            'gedung' => '',
            'no_hp' => '081196110727',
            'email' => ' ',
            'tmt_pensiun' => '2039-02-01'
        ]);

        Pegawai::create([
            'nip' => '198402142014021001',
            'nama' => 'Anggoro Agung Wijayanto, S.E., M.S.M.',
            'jabatan' => 'Kepala Subbagian Organisasi',
            'unit_kerja' => 'Bagian Organisasi dan Tata Laksana',
            'gedung' => '',
            'no_hp' => '08997815775',
            'email' => ' ',
            'tmt_pensiun' => '2042-03-01'
        ]);

        Pegawai::create([
            'nip' => '199610082020121001',
            'nama' => 'Dimaz Reza Prakasita, S.M.',
            'jabatan' => 'Kepala Subbagian Tata Laksana',
            'unit_kerja' => 'Bagian Organisasi dan Tata Laksana',
            'gedung' => '',
            'no_hp' => '081338307047',
            'email' => ' ',
            'tmt_pensiun' => '2054-11-01'
        ]);

Pegawai::create([
    'nip' => '196911251996031001',
    'nama' => 'Drs. Budi Jatnika, M.Si.',
    'jabatan' => 'Kepala Bagian Pembinaan Jabatan Fungsional',
    'unit_kerja' => 'Bagian Pembinaan Jabatan Fungsional',
    'gedung' => '',
    'no_hp' => '08121972995',
    'email' => '',
    'tmt_pensiun' => '2027-12-01'
]);

Pegawai::create([
    'nip' => '196808161988032002',
    'nama' => 'Erna Agustina, S.Sos.',
    'jabatan' => 'Kepala Bagian Sekretariat Badan Musyawarah',
    'unit_kerja' => 'Bagian Sekretariat Badan Musyawarah',
    'gedung' => '',
    'no_hp' => '08128282168',
    'email' => '',
    'tmt_pensiun' => '2026-09-01'
]);

Pegawai::create([
    'nip' => '196610081994031003',
    'nama' => 'Satyanto Priambodo, S.E., M.S.',
    'jabatan' => 'Inspektur II',
    'unit_kerja' => 'Inspektorat II',
    'gedung' => '',
    'no_hp' => '',
    'email' => '',
    'tmt_pensiun' => '2024-10-01'
]);

Pegawai::create([
    'nip' => '197911262003122003',
    'nama' => 'Reti Ardiyanti, S.E.',
    'jabatan' => 'Kepala Subbagian Tata Usaha Inspektorat II',
    'unit_kerja' => 'Inspektorat II',
    'gedung' => '',
    'no_hp' => '',
    'email' => '',
    'tmt_pensiun' => '2037-11-01'
]);

Pegawai::create([
    'nip' => '196510311994031002',
    'nama' => 'Drs. Mohammad Djazuli, M.Si.',
    'jabatan' => 'Kepala Biro Kesekretariatan Pimpinan',
    'unit_kerja' => 'Biro Kesekretariatan Pimpinan',
    'gedung' => '',
    'no_hp' => '',
    'email' => '',
    'tmt_pensiun' => '2025-10-01'
]);

Pegawai::create([
    'nip' => '197407202000032001',
    'nama' => 'Hikmah, S.Pd., M.Si.',
    'jabatan' => 'Kepala Bidang Pengembangan Kompetensi Teknis',
    'unit_kerja' => 'Pusat Pengembangan Kompetensi Teknis',
    'gedung' => '',
    'no_hp' => '',
    'email' => '',
    'tmt_pensiun' => '2032-07-01'
]);

Pegawai::create([
    'nip' => '197810262005022001',
    'nama' => 'Soraya, S.H., M.H.',
    'jabatan' => 'Analis Hukum Ahli Muda',
    'unit_kerja' => 'Bagian Pengaduan Masyarakat',
    'gedung' => '',
    'no_hp' => '',
    'email' => '',
    'tmt_pensiun' => '2036-10-01'
]);

Pegawai::create([
    'nip' => '197009151998031006',
    'nama' => 'Mardi Harjo, S.E., M.Si.',
    'jabatan' => 'Kepala Bagian Administrasi Keuangan',
    'unit_kerja' => 'Bagian Administrasi Keuangan',
    'gedung' => '',
    'no_hp' => '',
    'email' => '',
    'tmt_pensiun' => '2028-09-01'
]);
    }
}

