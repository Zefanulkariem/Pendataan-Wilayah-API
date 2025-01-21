<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuktiTransaksi;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Storage;

use Alert;

class BuktiTransaksiController extends Controller
{

    public function store(Request $request, )
    {
        $request->validate([
            'bukti_transaksi' => 'required|image|mimes:png,jpg,pdf|max:2048'
        ]);

        if($request->hasFile('bukti_transaksi')) {
            foreach ($request->file('bukti_transaksi') as $file) {
                $path = $file->store('bukti_transaksi', 'public');

                BuktiTransaksi::create([
                    'id_keuangan' => $id_keuangan,
                    'gambar_bukti' => $gambar,
                ]);
            }
        }

        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $bukti = BuktiTransaksi::findOrFail($id);
        Storage::disk('public')->delete($bukti->gambar_bukti);
        $bukti->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        return redirect()->back();
    }
}
