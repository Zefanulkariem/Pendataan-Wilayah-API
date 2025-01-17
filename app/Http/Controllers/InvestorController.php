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
        // dd(auth()->user()->getRoleNames());
        // if (auth()->user()->can('view_dashboard')) {
            // }
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
                    'bulan' => $lokasi->user->keuangan->bulan ?? 'Data tidak tersedia',
                    'income' => $lokasi->user->keuangan->income ?? 'Data tidak tersedia',
                    'outcome' => $lokasi->user->keuangan->outcome ?? 'Data tidak tersedia',
                    'profit_loss' => $lokasi->user->keuangan->profit_loss ?? 'Data tidak tersedia',
                ];
            });
            // dd($lokasis);
        return view('investor.maps', compact('lokasis'));

        return abort(403);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
}
