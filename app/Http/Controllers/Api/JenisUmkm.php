<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisUmkm as ModelUmkm;
use Illuminate\Http\JsonResponse;

class JenisUmkm extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $jenis_umkm = ModelUmkm::all();
        return response()->json([
            'success' => true, 
            'data' => $jenis_umkm
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'jenis_umkm' => 'required|unique:jenis_umkms'
        ]);

        $jenis_umkm = ModelUmkm::create(['jenis_umkm' => $request->jenis_umkm]);

        return response()->json(['success' => true, 'message' => 'Data berhasil ditambahkan', 'data' => $jenis_umkm]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $jenis_umkm = ModelUmkm::find($id);
        
        if (!$jenis_umkm) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(['success' => true, 'data' => $jenis_umkm]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $jenis_umkm = ModelUmkm::find($id);
        
        if (!$jenis_umkm) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $request->validate([
            'jenis_umkm' => 'required|unique:jenis_umkms,jenis_umkm,' . $id
        ]);

        $jenis_umkm->update(['jenis_umkm' => $request->jenis_umkm]);

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui', 'data' => $jenis_umkm]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $jenis_umkm = ModelUmkm::find($id);
        
        if (!$jenis_umkm) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $jenis_umkm->delete();
        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
