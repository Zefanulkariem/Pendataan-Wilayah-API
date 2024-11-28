<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use App\Models\Operasional;
use App\Models\KelengkapanLegalitasUsaha;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Dasbor';
        $uang = Keuangan::where('id_umkm', auth()->id())->get();

        $uang = $uang->map(function ($data) {
            // menghitung keuntungan
            $profit = $data->income - $data->outcome;

            // kalau keuntungan lebih dari 0, hitung persen keuntungannya/rugi
            $data->persen = $data->income > 0 
                ? ($profit / $data->income) * 100 //hitung buat jadiin persentase
                : 0; // kalau tak ada keuntungan, buat persen jadi 0

            return $data;
        });
    
        // Hitung rata-rata persen profit dan ambil nilai persennya aja
        $rataRataPersen = $uang->count() > 0 ? $uang->pluck('persen')->avg() : 0;

        // cek data legalitas
        $legalitas = KelengkapanLegalitasUsaha::where('id_user', auth()->id())->first();
        $jmlField = 0;

        if ($legalitas) {
            // hitung jumlah field yang sudah diisi (ada kecuali)
            foreach ($legalitas->getAttributes() as $data => $value) {
                if (!in_array($data, ['id', 'id_user', 'created_at', 'updated_at']) && !is_null($value)) { //cek field
                    $jmlField++;
                }
            }
        }
        // dd($jmlField);

        // panggil data operasional
        $op = Operasional::where('id_umkm', auth()->id())->first();

        // panggil data keuangan
        $uang = Keuangan::where('id_umkm', auth()->id())->get();

        return view('umkm.index', compact('uang', 'rataRataPersen', 'op', 'title', 'jmlField', 'uang'));
        
        return abort(403);
    }

    public function profile()
    {
        $title = 'Profil';
        return view('umkm.profile.index', compact('title')); 

        return abort(403);
    }

    public function legalUsaha()
    {
        // return view('umkm.legalUsaha.index'); 

        // return abort(403);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
