<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class KeuanganApiController extends Controller
{
    public function index()
{
    $data = Keuangan::all(); // hanya sementara
    return response()->json([
        'status' => true,
        'message' => 'Data keuangan berhasil diambil',
        'data' => $data
    ]);
}
    public function notifications()
    {
        $count = Keuangan::where('status_verifikasi', 'Menunggu')->count();

        return response()->json([
            'status' => true,
            'message' => 'Jumlah notifikasi keuangan',
            'data' => $count
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'income' => 'required|numeric',
            'outcome' => 'required|numeric',
        ]);

        $profit_loss = $request->income - $request->outcome;
        $status = $profit_loss >= 0 ? 'Profit' : 'Loss';

        $uang = Keuangan::create([
            'tanggal' => $request->tanggal,
            'income' => $request->income,
            'outcome' => $request->outcome,
            'profit_loss' => $profit_loss,
            'status' => $status,
            'id_umkm' => auth()->id(),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Laporan keuangan berhasil ditambahkan',
            'data' => $uang
        ]);
    }

    public function show($id)
    {
        $uang = Keuangan::with('buktiTransaksi')->findOrFail($id);

        return response()->json([
            'status' => true,
            'message' => 'Detail keuangan',
            'data' => $uang
        ]);
    }

    public function destroy($id)
    {
        $uang = Keuangan::findOrFail($id);
        $uang->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data keuangan berhasil dihapus'
        ]);
    }

    public function approve($id)
    {
        $uang = Keuangan::findOrFail($id);
        $uang->status_verifikasi = 'Disetujui';
        $uang->save();

        return response()->json([
            'status' => true,
            'message' => 'Status keuangan disetujui'
        ]);
    }

    public function reject($id)
    {
        $uang = Keuangan::findOrFail($id);
        $uang->status_verifikasi = 'Ditolak';
        $uang->save();

        return response()->json([
            'status' => true,
            'message' => 'Status keuangan ditolak'
        ]);
    }
}
