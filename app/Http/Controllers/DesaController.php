<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

use Alert;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desa = Desa::all();
        $kecamatan = Kecamatan::all();
        return view('masterAdmin.desa.index', compact('desa', 'kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('masterAdmin.desa.create', compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_desa' => 'required|unique:desas',
            'id_kecamatan' => 'required',

        ]);

        $desa = new Desa;
        $desa->nama_desa = $request->nama_desa;
        $desa->id_kecamatan = $request->id_kecamatan;
        
        $desa->save();
        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Master Admindesa.index');
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
        $desa = Desa::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('masterAdmin.desa.edit', compact('desa', 'kecamatan'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_desa' => 'required|unique:desas',
            
        ]);
        
        $desa = Desa::findOrfail($id);
        $desa->nama_desa = $request->nama_desa;
        $desa->id_kecamatan = $request->id_kecamatan;
        
        $desa->save();
        Alert::success('Success Title', "Data Berhasil Di Edit")->autoClose(1000);
        return redirect()->route('Master Admindesa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $desa = Desa::findOrFail($id);

        $desa->delete();
        return redirect()->route('Master Admindesa.index')->with('success', 'User deleted successfully.');
    }
}
