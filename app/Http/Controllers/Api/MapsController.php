<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LokasiUmkm;
use App\Models\User;

class MapsController extends Controller
{
    public function index() {
    $jmlUserUmkm = User::role('Umkm')->count();

    $jmlLokasiUmkm = LokasiUmkm::count();

    $lokasis = LokasiUmkm::with('desa.kecamatan', 'user.keuangan', 'jenisUmkm')
        ->get()
        ->map(function ($lokasi) {
            $koordinat = explode(',', $lokasi->koordinat);

            $dataKeuangan = $lokasi->user->keuangan
                ->where('status_verifikasi', 'Disetujui')
                ->values()
                ->map(function ($keuangan) {
                    return [
                        'tanggal' => $keuangan->tanggal,
                        'income' => $keuangan->income,
                        'outcome' => $keuangan->outcome,
                        'profit_loss' => $keuangan->profit_loss,
                        'status_verifikasi' => $keuangan->status_verifikasi,
                    ];
                });

            return [
                'id' => $lokasi->id,
                'lat' => $koordinat[0] ?? null,
                'lon' => $koordinat[1] ?? null,
                'desa' => $lokasi->desa->nama_desa ?? null,
                'kecamatan' => $lokasi->desa->kecamatan->nama_kecamatan ?? null,
                'deskripsi' => $lokasi->deskripsi,
                'image' => $lokasi->image ? asset('upload/spots/' . $lokasi->image) : null,
                'nama_pemilik' => $lokasi->user->name ?? null,
                'kelamin' => $lokasi->user->gender ?? null,
                'nama_umkm' => $lokasi->nama_umkm,
                'jenis_umkm' => $lokasi->jenisUmkm->jenis_umkm ?? null,
                'link' => $lokasi->link,
                'keuangan' => $dataKeuangan,
            ];
        });
        
        return response()->json([
            'status' => 'success',
            'jmlUserUmkm' => $jmlUserUmkm,
            'jmlLokasiUmkm' => $jmlLokasiUmkm,
            'data' => $lokasis,
        ]);
    }
}
