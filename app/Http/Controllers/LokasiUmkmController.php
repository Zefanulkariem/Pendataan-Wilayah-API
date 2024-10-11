<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centre_Point;
use App\Models\LokasiUmkm;

class LokasiUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cp = Centre_Point::all();
        return view('masterAdmin.spot.index', compact('cp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centerPoint = Centre_Point::get()->first();
        return view('masterAdmin.spot.create', ['centerPoint' => $centerPoint]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'koorinat' => 'required',
            'nama_pemilik' => 'required',
            'nama_umkm' => 'required',
            'deskripsi' => 'required',
            'image' => 'file|image|mimes:png,jpg,jpeg'
        ]);

        $lk = new LokasiUmkm;
        if ($request->hasFile('image')) {

            /**
             * Upload file to public folder
             */
            // $file = $request->file('image');
            // $uploadFile = $file->hashName();
            // $file->move('upload/spots/', $uploadFile);
            // $spot->image = $uploadFile;

            /**
             * Upload file image to storage
             */
            $file = $request->file('image');
            $file->storeAs('public/storage',$file->hashName());
            $lk->image = $file->hashName();
        }

        $lk->nama_pemilik = $request->nama_pemilik;
        $lk->slug = Str::slug($request->nama_pemilik, '-');
        $lk->nama_umkm = $request->nama_umkm;
        $lk->deskripsi = $request->deskripsi;
        $lk->koordinat = $request->koordinat;
        $lk->save();

        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Master Adminspot.index');
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
