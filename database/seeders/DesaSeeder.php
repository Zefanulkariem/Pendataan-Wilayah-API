<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $desas = [
                ['nama_desa' => 'Desa Ancolmekar', 'id_kecamatan' => 'Arjasari'],
                ['nama_desa' => 'Desa Arjasari', 'id_kecamatan' => 'Arjasari'],
                ['nama_desa' => 'Desa Baros', 'id_kecamatan' => 'Arjasari'],
                ['nama_desa' => 'Desa Batukarut', 'id_kecamatan' => 'Arjasari'],
                ['nama_desa' => 'Desa Lebakwangi', 'id_kecamatan' => 'Arjasari'],
                ['nama_desa' => 'Desa Patrolsari', 'id_kecamatan' => 'Arjasari'],
                ['nama_desa' => 'Desa Pinggirsari', 'id_kecamatan' => 'Arjasari'],

                
            ];
        
            DB::table('kecamatans')->insert($kecamatans);
        }
    }
}
