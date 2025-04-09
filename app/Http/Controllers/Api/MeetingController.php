<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meeting;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $meetings = Meeting::where('id_investor', $user->id)->get();
        $userName = $user->name;

        return response()->json([
            'success' => true,
            'message' => 'Data Meeting',
            'name' => $userName,
            'data' => $meetings
        ]);
    }

    // Buat meeting baru
    public function store(Request $request)
    {
        $request->validate([
            'id_umkm' => 'required|exists:users,id',
            'judul' => 'required|string',
            'lokasi_meeting' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $meeting = Meeting::create([
            'id_investor' => Auth::id(),
            'id_umkm' => $request->id_umkm,
            'judul' => $request->judul,
            'lokasi_meeting' => $request->lokasi_meeting,
            'tanggal' => $request->tanggal,
            'status_verifikasi' => 'Menunggu',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Meeting berhasil dibuat',
            'data' => $meeting
        ]);
    }

    // Hapus meeting
    public function destroy($id)
    {
        $meeting = Meeting::where('id', $id)->where('id_investor', Auth::id())->first();

        if (!$meeting) {
            return response()->json([
                'status' => 'error',
                'message' => 'Meeting tidak ditemukan'
            ], 404);
        }

        $meeting->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Meeting berhasil dihapus'
        ]);
    }
}
