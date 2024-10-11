<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kecamatans = [
            ['nama_kecamatan' => 'Arjasari', ],
            ['nama_kecamatan' => 'Baleendah'],
            ['nama_kecamatan' => 'Banjaran'],
            ['nama_kecamatan' => 'Bojongsoang'],
            ['nama_kecamatan' => 'Cangkuang'],
            ['nama_kecamatan' => 'Cicalengka'],
            ['nama_kecamatan' => 'Cikancung'],
            ['nama_kecamatan' => 'Cilengkrang'],
            ['nama_kecamatan' => 'Cileunyi'],
            ['nama_kecamatan' => 'Cimaung'],
            ['nama_kecamatan' => 'Cimenyan'],
            ['nama_kecamatan' => 'Ciparay'],
            ['nama_kecamatan' => 'Ciwidey'],
            ['nama_kecamatan' => 'Dayeuhkolot'],
            ['nama_kecamatan' => 'Ibun'],
            ['nama_kecamatan' => 'Katapang'],
            ['nama_kecamatan' => 'Kertasari'],
            ['nama_kecamatan' => 'Kutawaringin'],
            ['nama_kecamatan' => 'Majalaya'],
            ['nama_kecamatan' => 'Margaasih'],
            ['nama_kecamatan' => 'Margahayu'],
            ['nama_kecamatan' => 'Nagreg'],
            ['nama_kecamatan' => 'Pacet'],
            ['nama_kecamatan' => 'Pameungpeuk'],
            ['nama_kecamatan' => 'Pangalengan'],
            ['nama_kecamatan' => 'Paseh'],
            ['nama_kecamatan' => 'Pasirjambu'],
            ['nama_kecamatan' => 'Rancabali'],
            ['nama_kecamatan' => 'Rancaekek'],
            ['nama_kecamatan' => 'Solokanjeruk'],
            ['nama_kecamatan' => 'Soreang'],
        ];
    
        DB::table('kecamatans')->insert($kecamatans);
    }
}
