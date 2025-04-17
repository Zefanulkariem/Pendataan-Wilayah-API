<?php

namespace App\Http\Controllers;

use App\Models\LokasiUmkm;
use App\Models\User;
use App\Models\Meeting;
use App\Events\AktivitasTercatat;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function index()
    {
        $title = 'Dasbor';
        $jmlUserUmkm = User::role('Umkm')->count();
        $jmlUmkm = LokasiUmkm::count();
        $meeting = Meeting::where('id_investor', auth()->id())->get();

        $lokasis = LokasiUmkm::with(['desa.kecamatan', 'user', 'user.keuangan'])
            ->get()
            ->map(function ($lokasi) {
                $koordinat = explode(',', $lokasi->koordinat);
                return [
                    'lat' => $koordinat[0],
                    'lon' => $koordinat[1],
                    'desa' => $lokasi->desa->nama_desa ?? 'Tidak diketahui',
                    'kecamatan' => $lokasi->desa->kecamatan->nama_kecamatan ?? 'Tidak diketahui',
                    'img' => $lokasi->image ? asset('upload/spots/' . $lokasi->image) : 'default_image_url',
                    'nama' => $lokasi->user->name,
                    'kelamin' => $lokasi->user->gender,
                    'namaUMKM' => $lokasi->nama_umkm,
                    'jenisUMKM' => $lokasi->jenisUmkm->jenis_umkm,
                    'link' => $lokasi->link,
                ];
            });

        return view('investor.index', compact('title', 'jmlUmkm', 'jmlUserUmkm', 'lokasis', 'meeting'));
    }

    public function profile()
    {
        $title = 'Profil';
        return view('investor.profile.index', compact('title')); 
    }

    public function maps()
    {
        $lokasis = LokasiUmkm::with('desa.kecamatan', 'user.keuangan')
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
                    'lat' => $koordinat[0],
                    'lon' => $koordinat[1],
                    'desa' => $lokasi->desa->nama_desa,
                    'kecamatan' => $lokasi->desa->kecamatan->nama_kecamatan,
                    'deskripsi' => $lokasi->deskripsi,
                    'img' => $lokasi->image ? asset('upload/spots/' . $lokasi->image) : 'default_image_url',
                    'nama' => $lokasi->user->name,
                    'kelamin' => $lokasi->user->gender,
                    'namaUMKM' => $lokasi->nama_umkm,
                    'jenisUMKM' => $lokasi->jenisUmkm->jenis_umkm,
                    'link' => $lokasi->link,
                    'keuangan' => $dataKeuangan,
                ];
            })
            ->toArray();

        return view('investor.maps', compact('lokasis'));
    }

    public function ajukanMeeting(Request $request)
    {
        $request->validate([
            'id_umkm' => 'required|exists:users,id',
            'tempat' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $meeting = Meeting::create([
            'id_investor' => auth()->id(),
            'id_umkm' => $request->id_umkm,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'status' => 'Menunggu',
        ]);

        // 🔥 Catat aktivitas menggunakan event
        event(new AktivitasTercatat(
            auth()->id(),
            auth()->user()->getRoleNames()->first(),
            'Mengajukan Meeting',
            'Investor mengajukan meeting dengan UMKM ID: ' . $request->id_umkm
        ));

        return redirect()->back()->with('success', 'Meeting berhasil diajukan!');
    }
}
