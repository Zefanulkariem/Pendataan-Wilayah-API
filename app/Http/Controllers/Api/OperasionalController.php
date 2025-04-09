<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operasional;
use Illuminate\Support\Facades\Validator;

class OperasionalController extends Controller
{
    public function index()
    {
        $operasionals = Operasional::with('user')->get();
        return response()->json([
            'success' => true,
            'message' => 'List Operasional',
            'data' => $operasionals
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_umkm' => 'required|exists:users,id',
            'jml_karyawan' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 400);
        }

        $operasional = Operasional::create([
            'id_umkm' => $request->id_umkm,
            'jml_karyawan' => $request->jml_karyawan
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data operasional berhasil ditambahkan',
            'data' => $operasional
        ]);
    }

    public function show($id)
    {
        $operasional = Operasional::with('user')->find($id);
        if (!$operasional) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(['success' => true, 'data' => $operasional]);
    }

    public function update(Request $request, $id)
    {
        $operasional = Operasional::find($id);
        if (!$operasional) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'jml_karyawan' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 400);
        }

        $operasional->update([
            'jml_karyawan' => $request->jml_karyawan
        ]);

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui', 'data' => $operasional]);
    }

    public function destroy($id)
    {
        $operasional = Operasional::find($id);
        if (!$operasional) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $operasional->delete();
        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
