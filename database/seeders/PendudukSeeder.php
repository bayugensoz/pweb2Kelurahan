<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penduduk;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     Penduduk::create([
    //         'nik' => '3507123456780001',
    //         'nama' => 'Budi Santoso',
    //         'jk' => 'L',
    //         'alamat' => 'Jl. Merdeka No. 10, RT 01 RW 01'
    //     ]);

    //     Penduduk::create([
    //         'nik' => '3507123456780002',
    //         'nama' => 'Siti Khotimah',
    //         'jk' => 'P',
    //         'alamat' => 'Jl. Mawar No. 05, RT 02 RW 01'
    //     ]);
    // }

    public function run(): void
    {
        $nama = [
            'Budi Santoso',
            'Siti Khotimah',
            'Andi Saputra',
            'Rina Wulandari',
            'Dedi Pratama',
            'Fajar Nugroho',
            'Ayu Lestari',
            'Rizky Ramadhan',
            'Nur Aini',
            'Agus Setiawan',
            'Dian Puspita',
            'Muhammad Iqbal',
            'Lukman Hakim',
            'Nabila Putri',
            'Yusuf Maulana',
            'Taufik Hidayat',
            'Rahmawati',
            'Dewi Sartika',
            'Slamet Riyadi',
            'Eko Prasetyo'
        ];

        foreach (range(1, 50) as $i) {
            Penduduk::create([
                'nik' => '3507123456' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'nama' => $nama[array_rand($nama)],
                'jk' => rand(0,1) ? 'L' : 'P',
                'alamat' => 'Jl. Melati No. '.rand(1,120).', RT '.rand(1,10).' RW '.rand(1,5),
            ]);
        }
    }
}
