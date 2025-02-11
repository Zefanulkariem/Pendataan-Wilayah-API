<?php

namespace App\Http\Controllers;
use App\Models\LokasiUmkm;
use App\Models\User;
use App\Models\Meeting;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Dasbor';

        // panggil & hitung jumlah pengguna umkm
        $jmlUserUmkm = User::role('Umkm')->count();

        // panggil & hitung jumlah umkm
        $jmlUmkm = LokasiUmkm::count();

        // panggil data meeting
        $meeting = Meeting::where('id_investor', auth()->id())->get();

        // panggil data lokasi umkm
        $lokasis = LokasiUmkm::with(['desa.kecamatan', 'user', 'user.keuangan'])
            ->get()
            ->map(function ($lokasi) {
                $koordinat = explode(',', $lokasi->koordinat); // Pisah latitude dan longitude
                return [
                    'lat' => $koordinat[0],
                    'lon' => $koordinat[1],
                    'desa' => $lokasi->desa->nama_desa ?? 'Tidak diketahui',
                    'kecamatan' => $lokasi->desa->kecamatan->nama_kecamatan ?? 'Tidak diketahui',
                    'deskripsi' =>$lokasi->deskripsi ?? 'Data Kosong',
                    'img' => $lokasi->image ? asset('upload/spots/' . $lokasi->image) : 'default_image_url',
                    'nama' => $lokasi->user->name,
                    'kelamin' => $lokasi->user->gender,
                    'namaUMKM' => $lokasi->nama_umkm,
                    'jenisUMKM' => $lokasi->jenisUmkm->jenis_umkm,
                    'link' => $lokasi->link,
                    'income' => $lokasi->user->keuangan->income ?? 'Data tidak tersedia',
                ];
            });
            // dd($lokasis);
        return view('investor.index', compact('title', 'jmlUmkm', 'jmlUserUmkm', 'lokasis', 'meeting'));
        
        return abort(403);
    }

    public function profile()
    {
        $title = 'Profil';
        return view('investor.profile.index', compact('title')); 

        return abort(403);
    }

    public function maps()
    {
        
        $lokasis = LokasiUmkm::with('desa.kecamatan', 'user.keuangan')
            ->get()
            ->map(function ($lokasi) {
                $koordinat = explode(',', $lokasi->koordinat); // Pisah latitude dan longitude
                $dataKeuangan = $lokasi->user->keuangan->map(function ($keuangan) {
                    return [
                        'tanggal' => $keuangan->tanggal,
                        'income' => $keuangan->income,
                        'outcome' => $keuangan->outcome,
                        'profit_loss' => $keuangan->profit_loss,
                    ];
                });

                // dd($dataKeuangan);
                
                return [
                    'lat' => $koordinat[0],
                    'lon' => $koordinat[1],
                    'desa' => $lokasi->desa->nama_desa,
                    'kecamatan' => $lokasi->desa->kecamatan->nama_kecamatan,
                    'deskripsi' =>$lokasi->deskripsi,
                    'img' => $lokasi->image ? asset('upload/spots/' . $lokasi->image) : 'default_image_url',
                    'nama' => $lokasi->user->name,
                    'kelamin' => $lokasi->user->gender,
                    'namaUMKM' => $lokasi->nama_umkm,
                    'jenisUMKM' => $lokasi->jenisUmkm->jenis_umkm,
                    'link' => $lokasi->link,
                    'keuangan' => $dataKeuangan, //kembalikan array ke data semula
                ];
            });
            // dd($lokasis);
        return view('investor.maps', compact('lokasis'));

        return abort(403);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
    
}
