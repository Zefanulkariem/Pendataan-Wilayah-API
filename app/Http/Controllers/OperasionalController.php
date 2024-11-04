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
        $op = Operasional::where('id_umkm', auth()->id())->get();
        return view('umkm.operasional.index', compact('op'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('umkm.operasional.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'karyawan' => 'required|string',
            'jml_karyawan' => 'required|integer',
        ]);

        // Cek data karyawan dengan posisi dan jumlah karyawan yang sama sudah ada untuk user ini
        $cek = Operasional::where('karyawan', $request->karyawan)
            ->where('jml_karyawan', $request->jml_karyawan)
            ->where('id_umkm', auth()->id())
            ->exists();

        if ($cek) {
            Alert::error('Error', 'Data dengan posisi dan jumlah karyawan ini sudah ada!')->autoClose(3000);
            return redirect()->back()->withInput();
        }

        $operasional = new Operasional;
        $operasional->karyawan = $request->karyawan;
        $operasional->jml_karyawan = $request->jml_karyawan;
        $operasional->id_umkm = auth()->id();

        $operasional->save();
        Alert::success('Success Title', "Data Berhasil Di Tambahkan ")->autoClose(1000);
        return redirect()->route('Umkmoperasional.index');
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
