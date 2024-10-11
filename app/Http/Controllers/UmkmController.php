<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PelakuUmkm;
use App\Models\JenisUmkm;
use App\Models\Desa;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('masterAdmin.umkm.index'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desa = Desa::all();
        $jenis_umkm = JenisUmkm::all();
        return view('masterAdmin.umkm.create', compact('desa', 'jenis_umkm'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'pemilik_umkm' => 'required|unique:pelaku_umkms',
            'nama_umkm' => 'required|string|max:255',
            'id_jenis_umkm' => 'required',
            'id_desa' => 'required',
            'kontak' => 'required|string|max:255',
            'id_lokasi_umkm' => 'nullable',
            'id_kelengkapan_legalitas_usaha' => 'nullable',
        ]);

        $umkm = new PelakuUmkm;
        $umkm->pemilik_umkm = $request->pemilik_umkm;
        $umkm->nama_umkm = $request->nama_umkm;
        $umkm->id_jenis_umkm = $request->id_jenis_umkm;
        $umkm->id_desa = $request->id_desa;
        $umkm->kontak = $request->kontak;
        $umkm->id_lokasi_umkm = $request->id_lokasi_umkm;
        $umkm->id_kelengkapan_legalitas_usaha = $request->id_kelengkapan_legalitas_usaha;

        $umkm->save();
        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Master Adminumkm.index');
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
