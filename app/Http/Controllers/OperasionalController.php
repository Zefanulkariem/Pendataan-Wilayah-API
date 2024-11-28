<?php

namespace App\Http\Controllers;
use App\Models\Operasional;
use Illuminate\Http\Request;

use Alert;

class OperasionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Operasional';
        $op = Operasional::where('id_umkm', auth()->id())->get();
        return view('umkm.operasional.index', compact('op', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambahkan Operasional';
        return view('umkm.operasional.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cek = Operasional::where('id_umkm', auth()->id())->exists();
        
        if($cek){
            return redirect()->back()->with('error', 'Hanya diperbolehkan mengisi data satu kali, Harap hapus data sebelumnya jika ingin memperbarui data.');
        }

        $validate = $request->validate([
            'jml_karyawan' => 'required|numeric',
        ]);

        $operasional = new Operasional;
        $operasional->id_umkm = auth()->id();
        $operasional->jml_karyawan = $request->jml_karyawan;

        $operasional->save();
        Alert::success('Success Title', "Data Berhasil Di Tambahkan")->autoClose(1000);
        return redirect()->route('Umkmoperasional.index')->with('success', 'Data Berhasil di Tambahkan');
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
        $operasional = Operasional::findOrFail($id);

        $operasional->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        return redirect()->route('Umkmoperasional.index')->with('success', 'Data Berhasil di Hapus');
    }
}
