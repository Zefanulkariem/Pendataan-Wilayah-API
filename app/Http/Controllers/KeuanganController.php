<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;

use Alert;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Daftar Keuangan';
        $uang = Keuangan::where('id_umkm', auth()->id())->get();

        return view('umkm.keuangan.index', compact('uang', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambahkan Keuangan';
        return view('umkm.keuangan.create', compact('title'));
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
        
    
        $profit_loss = $request->income - $request->outcome;

        // Tentukan status
        $status = $profit_loss >= 0 ? 'Profit' : 'Loss';
    
        // Simpan data keuangan
        $uang = new Keuangan;
        $uang->bulan = $request->bulan;
        $uang->tahun = $request->tahun;
        $uang->income = $request->income;
        $uang->outcome = $request->outcome;
        $uang->profit_loss = $profit_loss; // Gunakan hasil perhitungan
        $uang->status = $status; // Simpan status
        $uang->id_umkm = auth()->id();
    
        $uang->save();
    
        // Tampilkan pesan keberhasilan
        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Umkmkeuangan.index')->with('success', 'Data Berhasil di Tambah');
    
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
