<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Desa;
use App\Models\Kecamatan;


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
                ['nama_desa' => 'Rancakole', 'id_kecamatan' => 'Arjasari'],
                
                ['nama_desa' => 'Desa Bojong Malaka', 'id_kecamatan' => 'Baleendah'],
                ['nama_desa' => 'Desa Malakasari', 'id_kecamatan' => 'Baleendah'],
                ['nama_desa' => 'Desa Rancamanyar', 'id_kecamatan' => 'Baleendah'],
                ['nama_desa' => 'Kelurahan Jelekong', 'id_kecamatan' => 'Baleendah'],
                ['nama_desa' => 'Kelurahan Manggahang', 'id_kecamatan' => 'Baleendah'],
                ['nama_desa' => 'Kelurahan Wargamekar', 'id_kecamatan' => 'Baleendah'],
                
                ['nama_desa' => 'Desa Banjaran', 'id_kecamatan' => 'Banjaran'],
                ['nama_desa' => 'Desa Banjaran Wetan', 'id_kecamatan' => 'Banjaran'],
                ['nama_desa' => 'Desa Ciapus', 'id_kecamatan' => 'Banjaran'],
                ['nama_desa' => 'Desa Kamasan', 'id_kecamatan' => 'Banjaran'],
                ['nama_desa' => 'Desa Mangahurip', 'id_kecamatan' => 'Banjaran'],
                ['nama_desa' => 'Desa Sindangpanon', 'id_kecamatan' => 'Banjaran'],
                ['nama_desa' => 'Desa Tanjung Sari', 'id_kecamatan' => 'Banjaran'],
                
                ['nama_desa' => 'Desa Bojongsoang', 'id_kecamatan' => 'Bojongsoang'],
                ['nama_desa' => 'Desa Bojongsari', 'id_kecamatan' => 'Bojongsoang'],
                ['nama_desa' => 'Desa Buahbatu', 'id_kecamatan' => 'Bojongsoang'],
                ['nama_desa' => 'Desa Cipagalo', 'id_kecamatan' => 'Bojongsoang'],
                ['nama_desa' => 'Desa Lengkong', 'id_kecamatan' => 'Bojongsoang'],
                ['nama_desa' => 'Desa Tegalluar', 'id_kecamatan' => 'Bojongsoang'],
                
                ['nama_desa' => 'Desa Bandasari', 'id_kecamatan' => 'Cangkuang'],
                ['nama_desa' => 'Desa Cangkuang Wetan', 'id_kecamatan' => 'Cangkuang'],
                ['nama_desa' => 'Desa Ciluncat', 'id_kecamatan' => 'Cangkuang'],
                ['nama_desa' => 'Desa Jatisari', 'id_kecamatan' => 'Cangkuang'],
                ['nama_desa' => 'Desa Nagrak', 'id_kecamatan' => 'Cangkuang'],
                ['nama_desa' => 'Desa Pananjungan', 'id_kecamatan' => 'Cangkuang'],
                ['nama_desa' => 'Desa Tanjungsari', 'id_kecamatan' => 'Cangkuang'],
                
                ['nama_desa' => 'Desa Babakan Peuteuy', 'id_kecamatan' => 'Cicalengka'],
                ['nama_desa' => 'Desa Cicalengka Kulon', 'id_kecamatan' => 'Cicalengka'],
                ['nama_desa' => 'Desa Cicalengka Wetan', 'id_kecamatan' => 'Cicalengka'],
                ['nama_desa' => 'Desa Cikuya', 'id_kecamatan' => 'Cicalengka'],
                ['nama_desa' => 'Desa Dampit', 'id_kecamatan' => 'Cicalengka'],
                ['nama_desa' => 'Desa Margaasih', 'id_kecamatan' => 'Cicalengka'],
                ['nama_desa' => 'Desa Nagrog', 'id_kecamatan' => 'Cicalengka'],
                ['nama_desa' => 'Desa Narawita', 'id_kecamatan' => 'Cicalengka'],
                ['nama_desa' => 'Panenjoan', 'id_kecamatan' => 'Cicalengka'],
                ['nama_desa' => 'Desa Tanjungwangi', 'id_kecamatan' => 'Cicalengka'],
                ['nama_desa' => 'Desa Tenjolaya', 'id_kecamatan' => 'Cicalengka'],
                ['nama_desa' => 'Desa Waluya', 'id_kecamatan' => 'Cicalengka'],
                
                ['nama_desa' => 'Desa Cihanyir', 'id_kecamatan' => 'Cikancung'],
                ['nama_desa' => 'Desa Cikancung', 'id_kecamatan' => 'Cikancung'],
                ['nama_desa' => 'Desa Cikasungka', 'id_kecamatan' => 'Cikancung'],
                ['nama_desa' => 'Desa Ciluluk', 'id_kecamatan' => 'Cikancung'],
                ['nama_desa' => 'Desa Hegarmanah', 'id_kecamatan' => 'Cikancung'],
                ['nama_desa' => 'Desa Mandalasari', 'id_kecamatan' => 'Cikancung'],
                ['nama_desa' => 'Desa Mekarlaksana', 'id_kecamatan' => 'Cikancung'], //dua nama sama
                ['nama_desa' => 'Desa Srirahayu', 'id_kecamatan' => 'Cikancung'],
                ['nama_desa' => 'Desa Tanjunglaya', 'id_kecamatan' => 'Cikancung'],
                
                ['nama_desa' => 'Desa Cilengkrang', 'id_kecamatan' => 'Cilengkrang'],
                ['nama_desa' => 'Desa Cipanjalu', 'id_kecamatan' => 'Cilengkrang'],
                ['nama_desa' => 'Desa Ciporeat', 'id_kecamatan' => 'Cilengkrang'],
                ['nama_desa' => 'Desa Girimekar', 'id_kecamatan' => 'Cilengkrang'],
                ['nama_desa' => 'Desa Jatiendah', 'id_kecamatan' => 'Cilengkrang'],
                ['nama_desa' => 'Desa Melatiwangi', 'id_kecamatan' => 'Cilengkrang'],
                
                ['nama_desa' => 'Desa Cibiru Hilir', 'id_kecamatan' => 'Cileunyi'],
                ['nama_desa' => 'Desa Cibiru Wetan', 'id_kecamatan' => 'Cileunyi'],
                ['nama_desa' => 'Desa Cileunyi Kulon', 'id_kecamatan' => 'Cileunyi'],
                ['nama_desa' => 'Desa Cileunyi Wetan', 'id_kecamatan' => 'Cileunyi'],
                ['nama_desa' => 'Desa Cimekar', 'id_kecamatan' => 'Cileunyi'],
                ['nama_desa' => 'Desa Cinunuk', 'id_kecamatan' => 'Cileunyi'],
                
                ['nama_desa' => 'Desa Campakmulya', 'id_kecamatan' => 'Cimaung'],
                ['nama_desa' => 'Desa Cikalong', 'id_kecamatan' => 'Cimaung'],
                ['nama_desa' => 'Desa Cimaung', 'id_kecamatan' => 'Cimaung'],
                ['nama_desa' => 'Desa Cipinang', 'id_kecamatan' => 'Cimaung'],
                ['nama_desa' => 'Desa Jagabaya', 'id_kecamatan' => 'Cimaung'],
                ['nama_desa' => 'Desa Malasari', 'id_kecamatan' => 'Cimaung'],
                ['nama_desa' => 'Desa Mekarsari', 'id_kecamatan' => 'Cimaung'],
                ['nama_desa' => 'Desa Pasirhuni', 'id_kecamatan' => 'Cimaung'],
                ['nama_desa' => 'Desa Sukamaju', 'id_kecamatan' => 'Cimaung'],
                ['nama_desa' => 'Desa Warjabakti', 'id_kecamatan' => 'Cimaung'],
                
                ['nama_desa' => 'Desa Ciburial', 'id_kecamatan' => 'Cimenyan'],
                ['nama_desa' => 'Desa Cikadut', 'id_kecamatan' => 'Cimenyan'],
                ['nama_desa' => 'Desa Cimenyan', 'id_kecamatan' => 'Cimenyan'],
                ['nama_desa' => 'Desa Mandalamekar', 'id_kecamatan' => 'Cimenyan'],
                ['nama_desa' => 'Desa Mekarmanik', 'id_kecamatan' => 'Cimenyan'],
                ['nama_desa' => 'Desa Mekarsaluyu', 'id_kecamatan' => 'Cimenyan'],
                ['nama_desa' => 'Desa Sindanglaya', 'id_kecamatan' => 'Cimenyan'],
                ['nama_desa' => 'Kelurahan Cibeunying', 'id_kecamatan' => 'Cimenyan'],
                ['nama_desa' => 'Kelurahan Padasuka', 'id_kecamatan' => 'Cimenyan'],
                
                ['nama_desa' => 'Desa Babakan', 'id_kecamatan' => 'Ciparay'],
                ['nama_desa' => 'Desa Bumiwangi', 'id_kecamatan' => 'Ciparay'],
                ['nama_desa' => 'Desa Ciheulang', 'id_kecamatan' => 'Ciparay'],
                ['nama_desa' => 'Desa Cikoneng', 'id_kecamatan' => 'Ciparay'],
                ['nama_desa' => 'Desa Ciparay', 'id_kecamatan' => 'Ciparay'],
                ['nama_desa' => 'Desa Gunungleutik', 'id_kecamatan' => 'Ciparay'],
                ['nama_desa' => 'Desa Mangguharja', 'id_kecamatan' => 'Ciparay'],
                ['nama_desa' => 'Desa Mekarlaksana', 'id_kecamatan' => 'Ciparay'], //dua nama sama
                ['nama_desa' => 'Desa Mekarsari', 'id_kecamatan' => 'Ciparay'],
                ['nama_desa' => 'Desa Pakutandang', 'id_kecamatan' => 'Ciparay'],
                ['nama_desa' => 'Desa Sagarcipta', 'id_kecamatan' => 'Ciparay'],
                ['nama_desa' => 'Desa Sarimahi', 'id_kecamatan' => 'Ciparay'],
                ['nama_desa' => 'Desa Serangmekar', 'id_kecamatan' => 'Ciparay'],
                ['nama_desa' => 'Desa Sumbersari', 'id_kecamatan' => 'Ciparay'],
                
                ['nama_desa' => 'Desa Ciwidey', 'id_kecamatan' => 'Ciwidey'],
                ['nama_desa' => 'Desa Lebakmuncang', 'id_kecamatan' => 'Ciwidey'],
                ['nama_desa' => 'Desa Nengkelan', 'id_kecamatan' => 'Ciwidey'],
                ['nama_desa' => 'Desa Panundaan', 'id_kecamatan' => 'Ciwidey'],
                ['nama_desa' => 'Desa Panyocokan', 'id_kecamatan' => 'Ciwidey'],
                ['nama_desa' => 'Desa Rawabogo', 'id_kecamatan' => 'Ciwidey'],
                ['nama_desa' => 'Desa Sukawening', 'id_kecamatan' => 'Ciwidey'],
                
                ['nama_desa' => 'Desa Cangkuang Kulon', 'id_kecamatan' => 'Dayeuhkolot'],
                ['nama_desa' => 'Desa Cangkuang Wetan', 'id_kecamatan' => 'Dayeuhkolot'],
                ['nama_desa' => 'Desa Cangkuang Citereup', 'id_kecamatan' => 'Dayeuhkolot'],
                ['nama_desa' => 'Desa Dayeukolot', 'id_kecamatan' => 'Dayeuhkolot'],
                ['nama_desa' => 'Desa Sukapura', 'id_kecamatan' => 'Dayeuhkolot'],
                
                ['nama_desa' => 'Desa Cibeet', 'id_kecamatan' => 'Ibun'],
                ['nama_desa' => 'Desa Dukuh', 'id_kecamatan' => 'Ibun'],
                ['nama_desa' => 'Desa Ibun', 'id_kecamatan' => 'Ibun'],
                ['nama_desa' => 'Desa Karyalaksana', 'id_kecamatan' => 'Ibun'],
                ['nama_desa' => 'Desa Laksana', 'id_kecamatan' => 'Ibun'],
                ['nama_desa' => 'Desa Mekarwangi', 'id_kecamatan' => 'Ibun'],
                ['nama_desa' => 'Desa Neglasari', 'id_kecamatan' => 'Ibun'],
                ['nama_desa' => 'Desa Pangguh', 'id_kecamatan' => 'Ibun'],
                ['nama_desa' => 'Desa Sudi', 'id_kecamatan' => 'Ibun'],
                ['nama_desa' => 'Desa Talun', 'id_kecamatan' => 'Ibun'],
                ['nama_desa' => 'Desa Tanggulun', 'id_kecamatan' => 'Ibun'],
                
                ['nama_desa' => 'Desa Cilampeni', 'id_kecamatan' => 'Katapang'],
                ['nama_desa' => 'Desa Gandasari', 'id_kecamatan' => 'Katapang'],
                ['nama_desa' => 'Desa Katapang', 'id_kecamatan' => 'Katapang'],
                ['nama_desa' => 'Desa Pangauban', 'id_kecamatan' => 'Katapang'],
                ['nama_desa' => 'Desa Sangkanhurip', 'id_kecamatan' => 'Katapang'],
                ['nama_desa' => 'Desa Sukamukti', 'id_kecamatan' => 'Katapang'],
                
                ['nama_desa' => 'Desa Cibereum', 'id_kecamatan' => 'Kertasari'],
                ['nama_desa' => 'Desa Cihawuk', 'id_kecamatan' => 'Kertasari'],
                ['nama_desa' => 'Desa Cikembang', 'id_kecamatan' => 'Kertasari'],
                ['nama_desa' => 'Desa Neglawangi', 'id_kecamatan' => 'Kertasari'],
                ['nama_desa' => 'Desa Resmitingal', 'id_kecamatan' => 'Kertasari'],
                ['nama_desa' => 'Desa Santosa', 'id_kecamatan' => 'Kertasari'],
                ['nama_desa' => 'Desa Sukapura', 'id_kecamatan' => 'Kertasari'],
                ['nama_desa' => 'Desa Tarumajaya', 'id_kecamatan' => 'Kertasari'],
                
                ['nama_desa' => 'Desa Buninagara', 'id_kecamatan' => 'Kutawaringin'],
                ['nama_desa' => 'Desa Cibodas', 'id_kecamatan' => 'Kutawaringin'],
                ['nama_desa' => 'Desa Cilame', 'id_kecamatan' => 'Kutawaringin'],
                ['nama_desa' => 'Desa Gajahmekar', 'id_kecamatan' => 'Kutawaringin'],
                ['nama_desa' => 'Desa Jatisari', 'id_kecamatan' => 'Kutawaringin'],
                ['nama_desa' => 'Desa Jelegong', 'id_kecamatan' => 'Kutawaringin'],
                ['nama_desa' => 'Desa Kopo', 'id_kecamatan' => 'Kutawaringin'],
                ['nama_desa' => 'Desa Kutawaringin', 'id_kecamatan' => 'Kutawaringin'],
                ['nama_desa' => 'Desa Padasuka', 'id_kecamatan' => 'Kutawaringin'],
                ['nama_desa' => 'Desa Pameuntasan', 'id_kecamatan' => 'Kutawaringin'],
                ['nama_desa' => 'Desa Sukamulya', 'id_kecamatan' => 'Kutawaringin'],
                
                ['nama_desa' => 'Desa Biru', 'id_kecamatan' => 'Majalaya'],
                ['nama_desa' => 'Desa Bojong', 'id_kecamatan' => 'Majalaya'],
                ['nama_desa' => 'Desa Majakerta', 'id_kecamatan' => 'Majalaya'],
                ['nama_desa' => 'Desa Majalaya', 'id_kecamatan' => 'Majalaya'],
                ['nama_desa' => 'Desa Majasetra', 'id_kecamatan' => 'Majalaya'],
                ['nama_desa' => 'Desa Neglasari', 'id_kecamatan' => 'Majalaya'],
                ['nama_desa' => 'Desa Padamulya', 'id_kecamatan' => 'Majalaya'],
                ['nama_desa' => 'Desa Padaulun', 'id_kecamatan' => 'Majalaya'],
                ['nama_desa' => 'Desa Sukamaju', 'id_kecamatan' => 'Majalaya'],
                ['nama_desa' => 'Desa Sukamukti', 'id_kecamatan' => 'Majalaya'],
                ['nama_desa' => 'Desa Wangisagara', 'id_kecamatan' => 'Majalaya'],
                
                ['nama_desa' => 'Desa Cigondewah Hilir', 'id_kecamatan' => 'Margaasih'],
                ['nama_desa' => 'Desa Lagadar', 'id_kecamatan' => 'Margaasih'],
                ['nama_desa' => 'Desa Margaasih', 'id_kecamatan' => 'Margaasih'],
                ['nama_desa' => 'Desa Mekar Rahayu', 'id_kecamatan' => 'Margaasih'],
                ['nama_desa' => 'Desa Nanjung', 'id_kecamatan' => 'Margaasih'],
                ['nama_desa' => 'Desa Rahayu', 'id_kecamatan' => 'Margaasih'],
                
                ['nama_desa' => 'Desa Margahayu Selatan', 'id_kecamatan' => 'Margahayu'],
                ['nama_desa' => 'Desa Margahayu Tengah', 'id_kecamatan' => 'Margahayu'],
                ['nama_desa' => 'Desa Sayati', 'id_kecamatan' => 'Margahayu'],
                ['nama_desa' => 'Desa Sukamenak', 'id_kecamatan' => 'Margahayu'],
                
                ['nama_desa' => 'Desa Bojong', 'id_kecamatan' => 'Nagreg'],
                ['nama_desa' => 'Desa Ciaro', 'id_kecamatan' => 'Nagreg'],
                ['nama_desa' => 'Desa Ciherang', 'id_kecamatan' => 'Nagreg'],
                ['nama_desa' => 'Desa Citaman', 'id_kecamatan' => 'Nagreg'],
                ['nama_desa' => 'Desa Ganjarsabar', 'id_kecamatan' => 'Nagreg'],
                ['nama_desa' => 'Desa Mandalawangi', 'id_kecamatan' => 'Nagreg'],
                ['nama_desa' => 'Desa Nagreg', 'id_kecamatan' => 'Nagreg'],
                ['nama_desa' => 'Desa Nagreg Kendan', 'id_kecamatan' => 'Nagreg'],
                
                ['nama_desa' => 'Desa Cigenteur', 'id_kecamatan' => 'Paseh'],
                ['nama_desa' => 'Desa Cijaga', 'id_kecamatan' => 'Paseh'],
                ['nama_desa' => 'Desa Cipaku', 'id_kecamatan' => 'Paseh'],
                ['nama_desa' => 'Desa Cipedes', 'id_kecamatan' => 'Paseh'],
                ['nama_desa' => 'Desa Drawati', 'id_kecamatan' => 'Paseh'],
                ['nama_desa' => 'Desa Karangtunggal', 'id_kecamatan' => 'Paseh'],
                ['nama_desa' => 'Desa Loa', 'id_kecamatan' => 'Paseh'],
                ['nama_desa' => 'Desa Mekarpawitan', 'id_kecamatan' => 'Paseh'],
                ['nama_desa' => 'Desa Sindangsari', 'id_kecamatan' => 'Paseh'],
                ['nama_desa' => 'Desa Sukamanah', 'id_kecamatan' => 'Paseh'],
                ['nama_desa' => 'Desa Sukamantri', 'id_kecamatan' => 'Paseh'],
                ['nama_desa' => 'Desa Tangsimekar', 'id_kecamatan' => 'Paseh'],
                
                ['nama_desa' => 'Desa Banjarsari', 'id_kecamatan' => 'Pangalengan'],
                ['nama_desa' => 'Desa Lamajang', 'id_kecamatan' => 'Pangalengan'],
                ['nama_desa' => 'Desa Margaluyu', 'id_kecamatan' => 'Pangalengan'],
                ['nama_desa' => 'Desa Margamekar', 'id_kecamatan' => 'Pangalengan'],
                ['nama_desa' => 'Desa Margamukti', 'id_kecamatan' => 'Pangalengan'],
                ['nama_desa' => 'Desa Margamulya', 'id_kecamatan' => 'Pangalengan'],
                ['nama_desa' => 'Desa Pangalengan', 'id_kecamatan' => 'Pangalengan'],
                ['nama_desa' => 'Desa Pulosari', 'id_kecamatan' => 'Pangalengan'],
                ['nama_desa' => 'Desa Sukaluyu', 'id_kecamatan' => 'Pangalengan'],
                ['nama_desa' => 'Desa Sukamanah', 'id_kecamatan' => 'Pangalengan'],
                ['nama_desa' => 'Desa Tribaktimulya', 'id_kecamatan' => 'Pangalengan'],
                ['nama_desa' => 'Desa Wanasuka', 'id_kecamatan' => 'Pangalengan'],
                ['nama_desa' => 'Desa Warnasari', 'id_kecamatan' => 'Pangalengan'],
                
                ['nama_desa' => 'Desa Cikawao', 'id_kecamatan' => 'Pacet'],
                ['nama_desa' => 'Desa Cikitu', 'id_kecamatan' => 'Pacet'],
                ['nama_desa' => 'Desa Cinanggela', 'id_kecamatan' => 'Pacet'],
                ['nama_desa' => 'Desa Cipeujeuh', 'id_kecamatan' => 'Pacet'],
                ['nama_desa' => 'Desa Girimulya', 'id_kecamatan' => 'Pacet'],
                ['nama_desa' => 'Desa Mandalahaji', 'id_kecamatan' => 'Pacet'],
                ['nama_desa' => 'Desa Maruyung', 'id_kecamatan' => 'Pacet'],
                ['nama_desa' => 'Desa Mekarjaya', 'id_kecamatan' => 'Pacet'],
                ['nama_desa' => 'Desa Mekarsari', 'id_kecamatan' => 'Pacet'],
                ['nama_desa' => 'Desa Nagrak', 'id_kecamatan' => 'Pacet'],
                ['nama_desa' => 'Desa Pangauban', 'id_kecamatan' => 'Pacet'],
                ['nama_desa' => 'Desa Sukarame', 'id_kecamatan' => 'Pacet'],
                ['nama_desa' => 'Desa Tanjungwangi', 'id_kecamatan' => 'Pacet'],
                
                ['nama_desa' => 'Desa Bojongkunci', 'id_kecamatan' => 'Pameungpeuk'],
                ['nama_desa' => 'Desa Bojongmanggu', 'id_kecamatan' => 'Pameungpeuk'],
                ['nama_desa' => 'Desa Langonsari', 'id_kecamatan' => 'Pameungpeuk'],
                ['nama_desa' => 'Desa Rancamulya', 'id_kecamatan' => 'Pameungpeuk'],
                ['nama_desa' => 'Desa Rancatungku', 'id_kecamatan' => 'Pameungpeuk'],
                ['nama_desa' => 'Desa Sukasari', 'id_kecamatan' => 'Pameungpeuk'],
                
                ['nama_desa' => 'Desa Cibodas', 'id_kecamatan' => 'Pasirjambu'],
                ['nama_desa' => 'Desa Cikoneng', 'id_kecamatan' => 'Pasirjambu'],
                ['nama_desa' => 'Desa Cisondari', 'id_kecamatan' => 'Pasirjambu'],
                ['nama_desa' => 'Desa Cukaggenteng', 'id_kecamatan' => 'Pasirjambu'],
                ['nama_desa' => 'Desa Margamulya', 'id_kecamatan' => 'Pasirjambu'],
                ['nama_desa' => 'Desa Mekarmaju', 'id_kecamatan' => 'Pasirjambu'],
                ['nama_desa' => 'Desa Mekarsari', 'id_kecamatan' => 'Pasirjambu'],
                ['nama_desa' => 'Desa Pasirjambu', 'id_kecamatan' => 'Pasirjambu'],
                ['nama_desa' => 'Desa Sugihmukti', 'id_kecamatan' => 'Pasirjambu'],
                ['nama_desa' => 'Desa Tenjolaya', 'id_kecamatan' => 'Pasirjambu'],
                
                ['nama_desa' => 'Desa Alamendah', 'id_kecamatan' => 'Rancabali'],
                ['nama_desa' => 'Desa Cipelah', 'id_kecamatan' => 'Rancabali'],
                ['nama_desa' => 'Desa Indragiri', 'id_kecamatan' => 'Rancabali'],
                ['nama_desa' => 'Desa Patengan', 'id_kecamatan' => 'Rancabali'],
                ['nama_desa' => 'Desa Sukaresmi', 'id_kecamatan' => 'Rancabali'],
                
                ['nama_desa' => 'Desa Bojongloa', 'id_kecamatan' => 'Rancaekek'],
                ['nama_desa' => 'Desa Bojongsalam', 'id_kecamatan' => 'Rancaekek'],
                ['nama_desa' => 'Desa Cangkuang', 'id_kecamatan' => 'Rancaekek'],
                ['nama_desa' => 'Desa Haurpugur', 'id_kecamatan' => 'Rancaekek'],
                ['nama_desa' => 'Desa Jelegong', 'id_kecamatan' => 'Rancaekek'],
                ['nama_desa' => 'Desa Linggar', 'id_kecamatan' => 'Rancaekek'],
                ['nama_desa' => 'Desa Nanjungmekar', 'id_kecamatan' => 'Rancaekek'],
                ['nama_desa' => 'Desa Rancaekek Kulon', 'id_kecamatan' => 'Rancaekek'],
                ['nama_desa' => 'Desa Rancaekek Wetan', 'id_kecamatan' => 'Rancaekek'],
                ['nama_desa' => 'Desa Sangiang', 'id_kecamatan' => 'Rancaekek'],
                ['nama_desa' => 'Desa Sukamanah', 'id_kecamatan' => 'Rancaekek'],
                ['nama_desa' => 'Desa Sukamulya', 'id_kecamatan' => 'Rancaekek'],
                ['nama_desa' => 'Desa Tegalsumedang', 'id_kecamatan' => 'Rancaekek'],
                ['nama_desa' => 'Kelurahan Rancaekek Kencana', 'id_kecamatan' => 'Rancaekek'],
                
                ['nama_desa' => 'Desa Bojongemas', 'id_kecamatan' => 'Solokanjeruk'],
                ['nama_desa' => 'Desa Cibodas', 'id_kecamatan' => 'Solokanjeruk'],
                ['nama_desa' => 'Desa Langensari', 'id_kecamatan' => 'Solokanjeruk'],
                ['nama_desa' => 'Desa Padamukti', 'id_kecamatan' => 'Solokanjeruk'],
                ['nama_desa' => 'Desa Panyadap', 'id_kecamatan' => 'Solokanjeruk'],
                ['nama_desa' => 'Desa Rancakasumba', 'id_kecamatan' => 'Solokanjeruk'],
                ['nama_desa' => 'Desa Solokanjeruk', 'id_kecamatan' => 'Solokanjeruk'],
                
                ['nama_desa' => 'Desa Cingcin', 'id_kecamatan' => 'Soreang'],
                ['nama_desa' => 'Desa Karamatmulya', 'id_kecamatan' => 'Soreang'],
                ['nama_desa' => 'Desa Pamekaran', 'id_kecamatan' => 'Soreang'],
                ['nama_desa' => 'Desa Panyirapan', 'id_kecamatan' => 'Soreang'],
                ['nama_desa' => 'Desa Parungserab', 'id_kecamatan' => 'Soreang'],
                ['nama_desa' => 'Desa Sadu', 'id_kecamatan' => 'Soreang'],
                ['nama_desa' => 'Desa Sekarwangi', 'id_kecamatan' => 'Soreang'],
                ['nama_desa' => 'Desa Soreang', 'id_kecamatan' => 'Soreang'],
                ['nama_desa' => 'Desa Sukajadi', 'id_kecamatan' => 'Soreang'],
                ['nama_desa' => 'Desa Sukanagara', 'id_kecamatan' => 'Soreang']

            ];

            foreach ($desas as $desa) {
                // Cari ID kecamatan berdasarkan nama
                $kecamatan = Kecamatan::where('nama_kecamatan', $desa['id_kecamatan'])->first();
    
                if ($kecamatan) {
                    // Buat data desa dengan id_kecamatan yang sudah berupa ID
                    Desa::create([
                        'nama_desa' => $desa['nama_desa'],
                        'id_kecamatan' => $kecamatan->id, // Gunakan ID kecamatan
                    ]);
                } else {
                    echo "Kecamatan {$desa['id_kecamatan']} tidak ditemukan.\n";
                }
            }
        }
    }
}
