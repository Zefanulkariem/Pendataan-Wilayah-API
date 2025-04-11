<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keuangan;
use App\Models\Operasional;
use App\Models\KelengkapanLegalitasUsaha;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    public function index()
    {
        $uang = Keuangan::where('id_umkm', auth()->id())->get();

        $uang = $uang->map(function ($data) {
            $profit = $data->income - $data->outcome;
            $data->persen = $data->income > 0 ? ($profit / $data->income) * 100 : 0;
            return $data;
        });

        $rataRataPersen = $uang->count() > 0 ? $uang->pluck('persen')->avg() : 0;

        $legalitas = KelengkapanLegalitasUsaha::where('id_user', auth()->id())->first();
        $jmlField = 0;

        if ($legalitas) {
            foreach ($legalitas->getAttributes() as $data => $value) {
                if (!in_array($data, ['id', 'id_user', 'created_at', 'updated_at']) && !is_null($value)) {
                    $jmlField++;
                }
            }
        }

        $op = Operasional::where('id_umkm', auth()->id())->first();

        return response()->json([
            'keuangan' => $uang,
            'rata_rata_persen' => $rataRataPersen,
            'operasional' => $op,
            'jumlah_field_legalitas' => $jmlField,
        ]);
    }

    public function profile()
    {
        $user = Auth::user();
        return response()->json($user);
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json(['message' => 'Profil berhasil diperbarui.', 'user' => $user]);
    }

    public function legalUsaha()
    {
        $legalitas = KelengkapanLegalitasUsaha::where('id_user', auth()->id())->first();

        return response()->json([
            'legalitas' => $legalitas
        ]);
    }
}
