<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marketing;

use Alert;

class MarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Daftar Marketing';
        $market = Marketing::where('id_umkm', auth()->id())->get();
        return view('umkm.marketing.index', compact('market', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambahkan Daftar Marketing';
        return view('umkm.marketing.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'bulan' => 'required|string',
            'tahun' => 'required|integer',
            'target_tahunan' => 'required|string',
            'target_bulanan' => 'required|string',
        ]);

        $market = new Marketing;
        $market->bulan = $request->bulan;
        $market->tahun = $request->tahun;
        $market->target_tahunan = $request->target_tahunan;
        $market->target_bulanan = $request->target_bulanan;
        $market->id_umkm = auth()->id();

        $market->save();

        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Umkmmarketing.index')->with('success', 'Data Berhasil di Tambah');
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
        $market = Marketing::findOrFail($id);

        $market->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        return redirect()->route('Umkmmarketing.index')->with('success', 'Data Berhasil di Hapus');
    }
}
