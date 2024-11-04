<?php

namespace App\Http\Controllers;
use App\Models\Keuangan;
use Illuminate\Http\Request;

use Alert;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uang = Keuangan::where('id_umkm', auth()->id())->get();
        return view('umkm.keuangan.index', compact('uang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('umkm.keuangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'tahun' => 'required|integer',
            'bulan' => 'required|string',
            'income' => 'required|string',
            'outcome' => 'required|string',
        ]);

        $uang = new Keuangan;
        $uang->bulan = $request->bulan;
        $uang->tahun = $request->tahun;
        $uang->income = $request->income;
        $uang->outcome = $request->outcome;
        $uang->id_umkm = auth()->id();

        $uang->save();
        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Umkmkeuangan.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $uang = Keuangan::findOrFail($id);

        $uang->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        return redirect()->route('Umkmkeuangan.index')->with('success', 'Data Berhasil di Hapus');
    }
}
