<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PelakuUmkm;
use App\Models\Desa;
use App\Models\User;
use App\Models\KelengkapanLegalitasUsaha;

use Alert;

class PemilikUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pk = PelakuUmkm::whereHas('user.roles', function ($query) {
            $query->where('name', 'Umkm'); //ini namanya closure yah | kondisi
        })->with('user', 'desa')->get(); //kalo ini metode Eager Loading
    
        return view('masterAdmin.pelakuUmkm.index', compact('pk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desa = Desa::all();
        
        $idUser = User::whereHas('roles', function ($query) {
            $query->where('name', 'Umkm');
        })->get();

        $legalUsaha = KelengkapanLegalitasUsaha::all();
        return view('masterAdmin.pelakuUmkm.create', compact('desa', 'legalUsaha', 'idUser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
        'id_user' => 'required|exists:users,id',
        'kontak' => 'required|numeric',
        'id_desa' => 'required|exists:desas,id', 
        ]);

        $pk = new PelakuUmkm;
        $pk->id_user = $request->id_user;
        $pk->kontak = $request->kontak;
        $pk->id_desa = $request->id_desa;

        $pk->save();
        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Master Adminkepemilikan-umkm.index');
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
        $desa = Desa::all();
        
        $idUser = User::whereHas('roles', function ($query) {
            $query->where('name', 'Umkm');
        })->get();

        $legalUsaha = KelengkapanLegalitasUsaha::all();
        $pk = PelakuUmkm::findOrFail($id);
        return view('masterAdmin.pelakuUmkm.edit', compact('desa', 'pk', 'idUser', 'legalUsaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'id_user' => 'required',
            'kontak' => 'required|numeric',
            'id_desa' => 'required',

        ]);

        $pk = PelakuUmkm::findOrFail($id);
        $pk->id_user = $request->id_user;
        $pk->kontak = $request->kontak;
        $pk->id_desa = $request->id_desa;

        $pk->save();
        Alert::success('Success Title', "Data Berhasil Di Update")->autoClose(1000);
        return redirect()->route('Master Adminkepemilikan-umkm.index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pk = PelakuUmkm::findOrFail($id);
        
        $pk->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        return redirect()->route('Master Adminkepemilikan-umkm.index')->with('success', 'User deleted successfully.');
    }
}
