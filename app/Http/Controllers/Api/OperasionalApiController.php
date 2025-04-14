<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operasional;

class OperasionalApiController extends Controller
{
    public function index()
    {
        $data = Operasional::where('id_umkm', auth()->id())->get();
        return response()->json(['status' => true, 'data' => $data]);
    }

    public function store(Request $request)
    {
        $cek = Operasional::where('id_umkm', auth()->id())->exists();

        if ($cek) {
            return response()->json([
                'status' => false,
                'message' => 'Data sudah ada. Harap hapus data sebelumnya jika ingin memperbarui.'
            ], 400);
        }

        $validated = $request->validate([
            'jml_karyawan' => 'required|numeric',
        ]);

        $operasional = new Operasional;
        $operasional->id_umkm = auth()->id();
        $operasional->jml_karyawan = $validated['jml_karyawan'];
        $operasional->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $operasional
        ]);
    }

    public function destroy($id)
    {
        $operasional = Operasional::where('id', $id)
            ->where('id_umkm', auth()->id())
            ->first();

        if (!$operasional) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan atau tidak memiliki akses.'
            ], 404);
        }

        $operasional->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
