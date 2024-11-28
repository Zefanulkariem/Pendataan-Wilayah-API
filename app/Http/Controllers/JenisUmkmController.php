<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisUmkm;

use Alert;

class JenisUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Daftar Kategori Umkm';
        $jenis_umkm = JenisUmkm::all();
        return view('masterAdmin.jenisUmkm.index', compact('jenis_umkm', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambahkan Kategori Umkm';
        return view('masterAdmin.jenisUmkm.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'jenis_umkm' => 'required|unique:jenis_umkms'

        ]);

        $jenis_umkm = new JenisUmkm;
        $jenis_umkm->jenis_umkm = $request->jenis_umkm;

        $jenis_umkm->save();
        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Master Adminjenis-umkm.index')->with('success', 'Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Perbarui Data Kategori Umkm';
        $jenis_umkm = JenisUmkm::findOrFail($id);
        return view('masterAdmin.jenisUmkm.edit', compact('jenis_umkm', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'jenis_umkm' => 'required|unique:jenis_umkms',

        ]);

        $jenis_umkm = JenisUmkm::findOrfail($id);
        $jenis_umkm->jenis_umkm = $request->jenis_umkm;

        $jenis_umkm->save();
        Alert::success('Success Title', "Data Berhasil Di Edit")->autoClose(1000);
        return redirect()->route('Master Adminjenis-umkm.index')->with('success', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenis_umkm = JenisUmkm::findOrFail($id);

        $jenis_umkm->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        return redirect()->route('Master Adminjenis-umkm.index')->with('success', 'User deleted successfully.');
    }
}
