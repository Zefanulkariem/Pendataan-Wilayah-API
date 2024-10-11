<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisUmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis_umkms = [
            ['jenis_umkm'=>'Kelautan dan perikanan'],
            ['jenis_umkm'=>'Pertanian'],
            ['jenis_umkm'=>'Lingkungan hidup dan kehutanan'],
            ['jenis_umkm'=>'Energi dan sumber daya mineral'],
            ['jenis_umkm'=>'Ketenaganukliran'],
            ['jenis_umkm'=>'Perindustrian'],
            ['jenis_umkm'=>'Perdagangan'],
            ['jenis_umkm'=>'Pekerjaan umum dan perumahan rakyat'],
            ['jenis_umkm'=>'Transportasi'],
            ['jenis_umkm'=>'Kesehatan, obat dan makanan'],
            ['jenis_umkm'=>'Pendidikan dan kebudayaan'],
            ['jenis_umkm'=>'Pariwisata'],
            ['jenis_umkm'=>'Keagamaan'],
            ['jenis_umkm'=>'Pos, telekomunikasi, penyiaran, serta sistem dan transaksi elektronik'],
            ['jenis_umkm'=>'Pertahanan dan keamanan'],
            ['jenis_umkm'=>'Ketenagakerjaan'],
            ['jenis_umkm'=>'Keuangan']
        ];

        DB::table('jenis_umkms')->insert($jenis_umkms);

    }
}
