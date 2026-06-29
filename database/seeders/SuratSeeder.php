<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Surat;
use App\Models\Penduduk;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     // $warga1= Penduduk::first();

    //     // if($warga1){
    //     //     Surat::create([
    //     //         'nomor_surat' => '001/MK/2026',
    //     //         'jenis_surat' => 'Surat Keterangan Usaha (SKU)',
    //     //         'tanggal_ajuan' => '2026-05-15',
    //     //         'penduduk_id' => $warga1->id,
    //     //     ]);
    //     // }

    //     Surat::create([
    //         'nomor_surat' => '001/MK/2026',
    //         'jenis_surat' => 'Surat Pengantar SKCK',
    //         'tanggal_ajuan' => '2026-05-16',
    //         'penduduk_id' => 2,
    //     ]);
    // }

    public function run(): void
    {
        $jenisSurat = [
            'Surat Pengantar SKCK',
            'Surat Keterangan Domisili',
            'Surat Keterangan Usaha',
            'Surat Keterangan Tidak Mampu',
            'Surat Keterangan Belum Menikah',
            'Surat Keterangan Kelahiran',
            'Surat Keterangan Kematian',
            'Surat Pengantar Nikah'
        ];

        foreach (range(1, 100) as $i) {

            Surat::create([
                'nomor_surat' => sprintf('%03d/KEL/%d', $i, date('Y')),
                'jenis_surat' => $jenisSurat[array_rand($jenisSurat)],
                'tanggal_ajuan' => now()->subDays(rand(0,365)),
                'penduduk_id' => rand(1,50),
            ]);
        }
    }
}
