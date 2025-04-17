<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketing;
use Illuminate\Support\Facades\Auth;

class MarketingApiController extends Controller
{
    public function index()
    {
        $data = Marketing::where('id_umkm', Auth::id())->get();

        return response()->json([
            'status' => true,
            'message' => 'Data marketing berhasil diambil',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'bulan' => 'required|string',
            'tahun' => 'required|integer',
            'target_tahunan' => 'required|string',
            'target_bulanan' => 'required|string',
        ]);

        $marketing = new Marketing;
        $marketing->bulan = $request->bulan;
        $marketing->tahun = $request->tahun;
        $marketing->target_tahunan = $request->target_tahunan;
        $marketing->target_bulanan = $request->target_bulanan;
        $marketing->id_umkm = Auth::id();
        $marketing->save();

        return response()->json([
            'status' => true,
            'message' => 'Data marketing berhasil ditambahkan',
            'data' => $marketing
        ]);
    }

    public function destroy($id)
    {
        $marketing = Marketing::where('id', $id)
            ->where('id_umkm', Auth::id())
            ->first();

        if (!$marketing) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan atau tidak memiliki akses'
            ], 404);
        }

        $marketing->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data marketing berhasil dihapus'
        ]);
    }
}
