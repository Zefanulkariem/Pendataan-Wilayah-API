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
        $title = 'Legalitas Usaha';
        $legalUsaha = KelengkapanLegalitasUsaha::where('id_user', auth()->user()->id)->get();
        // dd($legalUsaha);
        return view('umkm.legalUsaha.index', compact('legalUsaha', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambahkan Legalitas Usaha';
        return view('umkm.legalUsaha.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cekData = KelengkapanLegalitasUsaha::where('id_user', auth()->user()->id)->first();

        if ($cekData) {
            Alert::error('Error', 'Anda sudah memiliki data legalitas usaha. Tidak dapat menginput ulang.')->autoClose(3000);
            return redirect()->back()->withInput();
        }

        $validatedData = $request->validate([
            'badan_usaha' => 'nullable|in:PT (Perseroan Terbatas),CV (Persekutuan Komanditer)',
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
        $legalUsaha->id_user = auth()->user()->id;

        $fields = ['akta_pendirian', 'SKDP', 'NPWP', 'SIUP', 'TDP'];
        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $uploadFile = $file->hashName();
                $file->storeAs('public/legalitas', $uploadFile);
                $legalUsaha->$field = $uploadFile;
            }
        }

        $legalUsaha->save();

        Alert::success('Success', 'Data Berhasil Ditambah')->autoClose(1000);
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
        $title = 'Perbarui Legalitas Usaha';
        $legalUsaha = KelengkapanLegalitasUsaha::find($id);
        // dd($legalUsaha);
        return view('umkm.legalUsaha.edit', compact('legalUsaha', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $cekData = KelengkapanLegalitasUsaha::where('id_user', auth()->user()->id)->first();

        // if ($cekData) {
        //     Alert::error('Error', 'Anda sudah memiliki data legalitas usaha. Tidak dapat menginput ulang.')->autoClose(3000);
        //     return redirect()->back()->withInput();
        // }

        $validatedData = $request->validate([
            'badan_usaha' => 'required|in:PT (Perseroan Terbatas),CV (Persekutuan Komanditer)',
            'akta_pendirian' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'NIB' => 'required|string:255',
            'SKDP' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'NPWP' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'SIUP' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'TDP' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $legalUsaha = KelengkapanLegalitasUsaha::findOrFail($id);
        $legalUsaha->badan_usaha = $request->badan_usaha;
        $legalUsaha->NIB = $request->NIB;
        $legalUsaha->id_user = auth()->user()->id;

        $fields = ['akta_pendirian', 'SKDP', 'NPWP', 'SIUP', 'TDP'];
        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $uploadFile = $file->hashName();
                $file->storeAs('public/legalitas', $uploadFile);
                $legalUsaha->$field = $uploadFile;
            }
        }

        $legalUsaha->save();

        Alert::success('Success', 'Data Berhasil Ditambah')->autoClose(1000);
        return redirect()->route('UmkmlegalUsaha.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
