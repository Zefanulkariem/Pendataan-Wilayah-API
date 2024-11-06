<?php

namespace App\Http\Controllers;
use App\Models\LokasiUmkm;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('investor.index');
        
        return abort(403);
    }

    public function profile()
    {
        // dd(auth()->user()->getRoleNames());
        // if (auth()->user()->can('view_dashboard')) {
            // }
        return view('investor.profile.index'); 

        return abort(403);
    }

    public function maps()
    {
        
        $lokasis = LokasiUmkm::with('desa', 'user')
            ->get()
            ->map(function ($lokasi) {
                $koordinat = explode(',', $lokasi->koordinat); // Pisahkan latitude dan longitude
                return [
                    'lat' => $koordinat[0],
                    'lon' => $koordinat[1],
                    'kecamatan' => $lokasi->desa->nama_desa, // Ambil nama desa dari relasi
                    'img' => $lokasi->image,
                    'nama' => $lokasi->user->name, // Nama pemilik dari relasi user
                    'kelamin' => $lokasi->user->gender, // Gender pemilik dari relasi user (jika ada)
                    'namaUMKM' => $lokasi->nama_umkm,
                    // 'jenisUMKM' => $lokasi->jenis_umkm, // Pastikan ada field atau ambil dari relasi jika ada
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
