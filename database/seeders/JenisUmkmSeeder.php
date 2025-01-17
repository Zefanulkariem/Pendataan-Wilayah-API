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
            ['jenis_umkm'=>'Pengembangan Permainan'],
            ['jenis_umkm'=>'Arsitektur'],
            ['jenis_umkm'=>'Desain Interior'],
            ['jenis_umkm'=>'Musik'],
            ['jenis_umkm'=>'Seni Rupa'],
            ['jenis_umkm'=>'Desain Produk'],
            ['jenis_umkm'=>'Fesyen'],
            ['jenis_umkm'=>'Kuliner'],
            ['jenis_umkm'=>'Film, Animasi dan video'],
            ['jenis_umkm'=>'Fotografi'],
            ['jenis_umkm'=>'Desain Komunikasi Visual'],
            ['jenis_umkm'=>'Televisi dan Radio'],
            ['jenis_umkm'=>'Kriya'],
            ['jenis_umkm'=>'Periklanan'],
            ['jenis_umkm'=>'Seni Pertunjukan'],
            ['jenis_umkm'=>'Penerbitan'],
            ['jenis_umkm'=>'Aplikasi']
        ];

        DB::table('jenis_umkms')->insert($jenis_umkms);

    }
}
