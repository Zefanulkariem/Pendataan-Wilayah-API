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
        $kecamatan = Kecamatan::all();
        return view('masterAdmin.kecamatan.index', compact('kecamatan'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masterAdmin.kecamatan.create');
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
        return redirect()->route('Master Adminkecamatan.index');
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
        $kecamatan = Kecamatan::findOrFail($id);
        return view('masterAdmin.kecamatan.edit', compact('kecamatan'));
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
        return redirect()->route('Master Adminkecamatan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);

        $kecamatan->delete();
        return redirect()->route('Master Adminkecamatan.index')->with('success', 'User deleted successfully.');
    }
}
