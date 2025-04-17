<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use App\Models\BuktiTransaksi;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use Alert;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $title = 'Daftar Keuangan';
    $uang = Keuangan::where('id_umkm', auth()->id())->get();
    $user = Auth::user();
    $currentMonth = Carbon::now()->translatedFormat('F Y'); // Contoh: April 2025

    // Cek berdasarkan kolom tanggal, bukan created_at
    $hasFinance = Keuangan::where('id_umkm', $user->id_umkm)
        ->whereYear('tanggal', Carbon::now()->year)
        ->whereMonth('tanggal', Carbon::now()->month)
        ->exists();

    $notifications = [];
    if (!$hasFinance) {
        $notifications[] = "Anda harus mengisi laporan keuangan untuk bulan $currentMonth.";
    }

    return view('umkm.keuangan.index', compact('uang', 'title', 'notifications'));
}


    public function menu(Request $request)
    {
        $title = 'Status Keuangan';

        $filter = $request->input('filter', 'Semua');

        $query = Keuangan::with('user')->latest();

        if ($filter != 'Semua') {
            $query->where('status_verifikasi', $filter);
        }
    
        $uang = $query->get();

        $uangNotification = Keuangan::where('status_verifikasi', 'Menunggu')->get();

        // dd($uang);
        return view('masterAdmin.keuangan.menu', compact('uang', 'uangNotification', 'title', 'filter'));
    }

    public function menuadmin(Request $request)
    {
        $title = 'Status Keuangan';

        $filter = $request->input('filter', 'Semua');

        $query = Keuangan::with('user')->latest();

        if ($filter != 'Semua') {
            $query->where('status_verifikasi', $filter);
        }
    
        $uang = $query->get();

        $uangNotification = Keuangan::where('status_verifikasi', 'Menunggu')->get();

        // dd($uang);
        return view('admin.keuangan.menu', compact('uang', 'uangNotification', 'title', 'filter'));
    }

    //untuk menghitung jumlah notif yang statusses menunggu
    public function getNotifications()
    {
        $uangNotification = Keuangan::where('status_verifikasi', 'Menunggu')->count();

        return response()->json([
            'uangCount' => $uangNotification,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambahkan Keuangan';
        return view('umkm.keuangan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validate = $request->validate([
        //     'tahun' => 'required|integer',
        //     'bulan' => 'required|string',
        //     'income' => 'required|string',
        //     'outcome' => 'required|string',
        // ]);
        
    
        $profit_loss = $request->income - $request->outcome;

        // Tentukan status
        $status = $profit_loss >= 0 ? 'Profit' : 'Loss';
    
        // Simpan data keuangan
        $uang = new Keuangan;
        $uang->tanggal = $request->tanggal;
        $uang->income = $request->income;
        $uang->outcome = $request->outcome;
        $uang->profit_loss = $profit_loss; // Gunakan hasil perhitungan
        $uang->status = $status; // Simpan status
        $uang->id_umkm = auth()->id();
    
        $uang->save();

    
        // Tampilkan pesan keberhasilan
        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Umkmkeuangan.index')->with('success', 'Data Berhasil di Tambah');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = 'Status Keuangan';
        $uang = Keuangan::with('buktiTransaksi')->findOrFail($id);
        // dd($uang->buktiTransaksi);
        // $buktiTransaksi = $uang->buktiTransaksi; //jangan lupa atur modelnya dgn id_keuangan

        // dd($buktiTransaksi->pluck('gambar_bukti'));

        return view('masterAdmin.keuangan.show', compact('uang', 'title'));
    }
    public function showadmin($id)
    {
        $title = 'Status Keuangan';
        $uang = Keuangan::with('buktiTransaksi')->findOrFail($id);
        // dd($uang->buktiTransaksi);
        // $buktiTransaksi = $uang->buktiTransaksi; //jangan lupa atur modelnya dgn id_keuangan

        // dd($buktiTransaksi->pluck('gambar_bukti'));

        return view('masterAdmin.keuangan.show', compact('uang', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $uang = Keuangan::findOrFail($id);

        $uang->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        return redirect()->route('Umkmkeuangan.index')->with('success', 'Data Berhasil di Hapus');
    }
    public function approve($id)
    {
        $uang = Keuangan::findOrFail($id);
        $uang->status_verifikasi = 'Disetujui';
        $uang->save();

        return redirect()->back()->with('success', 'Status Keuangan Berhasil Disetujui.');
    }

    public function reject($id)
    {
        $uang = Keuangan::findOrFail($id);
        $uang->status_verifikasi = 'Ditolak';
        $uang->save();

        return redirect()->back()->with('success', 'Status Keuangan Berhasil Ditolak.');
    }
}
