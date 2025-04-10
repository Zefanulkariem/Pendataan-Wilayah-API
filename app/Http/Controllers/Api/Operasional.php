<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Operasional;
use Illuminate\Http\Request;

class OperasionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $op = Operasional::where('id_umkm', auth()->id())->get();
        return response()->json(['success' => true, 'data' => $op]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cek = Operasional::where('id_umkm', auth()->id())->exists();
        
        if($cek){
            return response()->json(['success' => false, 'message' => 'Hanya diperbolehkan mengisi data satu kali, Harap hapus data sebelumnya jika ingin memperbarui data.'], 400);
        }

        $request->validate([
            'jml_karyawan' => 'required|numeric',
        ]);

        $operasional = Operasional::create([
            'id_umkm' => auth()->id(),
            'jml_karyawan' => $request->jml_karyawan,
        ]);

        return response()->json(['success' => true, 'message' => 'Data berhasil ditambahkan', 'data' => $operasional]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $operasional = Operasional::where('id_umkm', auth()->id())->find($id);

        if (!$operasional) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $operasional->delete();
        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}





