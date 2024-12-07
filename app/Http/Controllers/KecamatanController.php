<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;

use Alert;
class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Daftar Kecamatan';
        $kecamatan = Kecamatan::all();
        return view('masterAdmin.kecamatan.index', compact('kecamatan', 'title'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambahkan Data Kecamatan';
        return view('masterAdmin.kecamatan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_kecamatan' => 'required|unique:kecamatans'

        ]);

        $kecamatan = new Kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;

        $kecamatan->save();
        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Master Adminkecamatan.index')->with('success', 'Data Berhasil di Tambah');
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
        $title = 'Perbarui Data Kecamatan';
        $kecamatan = Kecamatan::findOrFail($id);
        return view('masterAdmin.kecamatan.edit', compact('kecamatan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_kecamatan' => 'required',
        ]);

        $kecamatan = Kecamatan::findOrfail($id);
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;

        $kecamatan->save();
        Alert::success('Success Title', "Data Berhasil Di Edit")->autoClose(1000);
        return redirect()->route('Master Adminkecamatan.index')->with('success', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);

        $kecamatan->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        return redirect()->route('Master Adminkecamatan.index')->with('success', 'Data Berhasil di Hapus');
    }
}
