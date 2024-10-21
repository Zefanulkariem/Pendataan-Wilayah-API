<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\KelengkapanLegalitasUsaha;

use Alert;

class LegalUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $legalUsaha = KelengkapanLegalitasUsaha::all();
        return view('umkm.legalUsaha.index', compact('legalUsaha'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'badan_usaha' => 'required|in:pt,cv',
            'akta_pendirian' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'NIB' => 'required|string:255',
            'SKDP' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'NPWP' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'SIUP' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'TDP' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $legalUsaha = new KelengkapanLegalitasUsaha;
        $legalUsaha->badan_usaha = $request->badan_usaha;
        $legalUsaha->NIB = $request->NIB;

        $fields = ['akta_pendirian', 'SKDP', 'NPWP', 'SIUP', 'TDP']; // Daftar field yang akan diupload

        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $uploadFile = $file->hashName();

                $file->storeAs('public/legalitas', $uploadFile);

                $legalUsaha->$field = $uploadFile;
            }
        }

        $legalUsaha->save();

        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('UmkmlegalUsaha.index');
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
