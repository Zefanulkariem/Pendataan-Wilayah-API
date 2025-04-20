<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KelengkapanLegalitasUsaha;
use App\Events\AktivitasTerjadi;
use Illuminate\Support\Facades\Validator;

class LegalUsahaApiController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $data = KelengkapanLegalitasUsaha::where('id_user', $userId)->get();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'badan_usaha' => 'nullable|in:PT (Perseroan Terbatas),CV (Persekutuan Komanditer)',
            'NIB' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $cekData = KelengkapanLegalitasUsaha::where('id_user', $request->user()->id)->first();
        if ($cekData) {
            return response()->json([
                'status' => false,
                'message' => 'Data legalitas usaha sudah ada.'
            ], 409);
        }

        $legalUsaha = new KelengkapanLegalitasUsaha;
        $legalUsaha->badan_usaha = $request->badan_usaha;
        $legalUsaha->NIB = $request->NIB;
        $legalUsaha->id_user = $request->user()->id;
        $legalUsaha->save();

        event(new AktivitasTerjadi(
            $request->user()->id,
            $request->user()->getRoleNames()->first(),
            'Menambahkan Legalitas Usaha',
            'UMKM menambahkan data legalitas usaha'
        ));

        return response()->json([
            'status' => true,
            'message' => 'Legalitas usaha berhasil ditambahkan.'
        ]);
    }

    public function show($id)
    {
        $data = KelengkapanLegalitasUsaha::find($id);
        if (!$data) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(['status' => true, 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $legalUsaha = KelengkapanLegalitasUsaha::find($id);
        if (!$legalUsaha) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'badan_usaha' => 'nullable|in:PT (Perseroan Terbatas),CV (Persekutuan Komanditer)',
            'NIB' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $legalUsaha->badan_usaha = $request->badan_usaha;
        $legalUsaha->NIB = $request->NIB;
        $legalUsaha->save();

        event(new AktivitasTerjadi(
            $request->user()->id,
            $request->user()->getRoleNames()->first(),
            'Memperbarui Legalitas Usaha',
            'UMKM memperbarui data legalitas usaha ID: ' . $id
        ));

        return response()->json(['status' => true, 'message' => 'Data berhasil diperbarui']);
    }

    public function destroy($id)
    {
        $data = KelengkapanLegalitasUsaha::find($id);
        if (!$data) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $data->delete();
        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus']);
    }
}
